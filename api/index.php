<?php

try {
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

    // 3. Set environment variables & fallbacks for serverless execution
    $defaultEnvs = [
        'APP_ENV' => 'local',
        'APP_DEBUG' => 'true',
        'APP_KEY' => 'base64:0gIjhUzEZGNJSGIGJ4erCORNUWrFW8bw+U1JWpZzIUA=',
        'APP_STORAGE_PATH' => '/tmp/storage',
        'VIEW_COMPILED_PATH' => '/tmp/storage/framework/views',
        'APP_SERVICES_CACHE' => '/tmp/bootstrap/cache/services.php',
        'APP_PACKAGES_CACHE' => '/tmp/bootstrap/cache/packages.php',
        'APP_CONFIG_CACHE' => '/tmp/bootstrap/cache/config.php',
        'APP_ROUTES_CACHE' => '/tmp/bootstrap/cache/routes.php',
        'APP_EVENTS_CACHE' => '/tmp/bootstrap/cache/events.php',
        'DB_CONNECTION' => 'sqlite',
        'DB_DATABASE' => $targetDb,
        'CACHE_STORE' => 'array',
        'SESSION_DRIVER' => 'file',
        'QUEUE_CONNECTION' => 'sync',
        'FILESYSTEM_DISK' => 'local',
        'LOG_CHANNEL' => 'stderr',
    ];

    foreach ($defaultEnvs as $key => $val) {
        putenv("{$key}={$val}");
        $_ENV[$key] = $val;
        $_SERVER[$key] = $val;
    }

    // 4. Require standard Laravel entry point
    require __DIR__ . '/../public/index.php';

} catch (\Throwable $e) {
    http_response_code(500);
    echo "<div style='padding:20px; font-family:sans-serif;'>";
    echo "<h1 style='color:red;'>Vercel Serverless Error Debug</h1>";
    echo "<p><strong>Message:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>File:</strong> " . htmlspecialchars($e->getFile()) . ":" . $e->getLine() . "</p>";
    echo "<pre style='background:#f4f4f4; padding:15px; border-radius:5px;'>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "</div>";
}
