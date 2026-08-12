<?php

// 1. Prepare storage & bootstrap cache directory structure in writable /tmp directory for serverless
$storageDirs = [
    '/tmp/storage/app/public',
    '/tmp/storage/app/private',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// 2. Copy sqlite database to /tmp if it doesn't exist
$sourceDb = __DIR__ . '/../database/database.sqlite';
$targetDb = '/tmp/database.sqlite';

if (file_exists($sourceDb) && filesize($sourceDb) > 0 && !file_exists($targetDb)) {
    copy($sourceDb, $targetDb);
} elseif (!file_exists($targetDb)) {
    touch($targetDb);
}

// 3. Force non-empty default environment variables for serverless execution
$forcedEnvs = [
    'APP_ENV' => 'production',
    'APP_DEBUG' => 'false',
    'APP_KEY' => 'base64:0gIjhUzEZGNJSGIGJ4erCORNUWrFW8bw+U1JWpZzIUA=',
    'APP_STORAGE_PATH' => '/tmp/storage',
    'VIEW_COMPILED_PATH' => '/tmp/storage/framework/views',
    'APP_SERVICES_CACHE' => '/tmp/bootstrap/cache/services.php',
    'APP_PACKAGES_CACHE' => '/tmp/bootstrap/cache/packages.php',
    'APP_CONFIG_CACHE' => '/tmp/bootstrap/cache/config.php',
    'APP_ROUTES_CACHE' => '/tmp/bootstrap/cache/routes.php',
    'APP_EVENTS_CACHE' => '/tmp/bootstrap/cache/events.php',
    'APP_MAINTENANCE_DRIVER' => 'file',
    'DB_CONNECTION' => 'sqlite',
    'DB_DATABASE' => $targetDb,
    'CACHE_STORE' => 'array',
    'SESSION_DRIVER' => 'cookie',
    'QUEUE_CONNECTION' => 'sync',
    'FILESYSTEM_DISK' => 'local',
    'LOG_CHANNEL' => 'stderr',
    'MAIL_MAILER' => 'log',
];

foreach ($forcedEnvs as $key => $val) {
    $current = getenv($key);
    if ($current === false || trim((string)$current) === '') {
        putenv("{$key}={$val}");
        $_ENV[$key] = $val;
        $_SERVER[$key] = $val;
    }
}

// 4. Load Laravel app and enforce fallback config
define('LARAVEL_START', microtime(true));

require __DIR__ . '/../vendor/autoload.php';

/** @var \Illuminate\Foundation\Application $app */
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Guarantee valid fallback configs on application container
$app->booted(function ($app) use ($targetDb) {
    /** @var \Illuminate\Config\Repository $config */
    $config = $app->make('config');

    if (empty($config->get('session.driver'))) {
        $config->set('session.driver', 'cookie');
    }
    if (empty($config->get('cache.default'))) {
        $config->set('cache.default', 'array');
    }
    if (empty($config->get('filesystems.default'))) {
        $config->set('filesystems.default', 'local');
    }
    if (empty($config->get('logging.default'))) {
        $config->set('logging.default', 'stderr');
    }
    if (empty($config->get('database.default'))) {
        $config->set('database.default', 'sqlite');
    }
    if (empty($config->get('app.maintenance.driver'))) {
        $config->set('app.maintenance.driver', 'file');
    }
});

// 5. Handle incoming HTTP request
$app->handleRequest(\Illuminate\Http\Request::capture());
