<?php

// 1. Prepare storage & bootstrap cache directory structure in writable /tmp directory for serverless
$storageDirs = [
    '/tmp/storage/app/public',
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
if (!getenv('APP_KEY')) {
    putenv('APP_KEY=base64:0gIjhUzEZGNJSGIGJ4erCORNUWrFW8bw+U1JWpZzIUA=');
    $_ENV['APP_KEY'] = 'base64:0gIjhUzEZGNJSGIGJ4erCORNUWrFW8bw+U1JWpZzIUA=';
    $_SERVER['APP_KEY'] = 'base64:0gIjhUzEZGNJSGIGJ4erCORNUWrFW8bw+U1JWpZzIUA=';
}

putenv('APP_STORAGE_PATH=/tmp/storage');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
putenv('DB_CONNECTION=sqlite');
putenv('DB_DATABASE=' . $targetDb);
putenv('CACHE_STORE=array');
putenv('SESSION_DRIVER=cookie');

$_ENV['APP_STORAGE_PATH'] = '/tmp/storage';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
$_ENV['DB_CONNECTION'] = 'sqlite';
$_ENV['DB_DATABASE'] = $targetDb;
$_ENV['CACHE_STORE'] = 'array';
$_ENV['SESSION_DRIVER'] = 'cookie';

$_SERVER['APP_STORAGE_PATH'] = '/tmp/storage';
$_SERVER['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
$_SERVER['DB_CONNECTION'] = 'sqlite';
$_SERVER['DB_DATABASE'] = $targetDb;
$_SERVER['CACHE_STORE'] = 'array';
$_SERVER['SESSION_DRIVER'] = 'cookie';

// 4. Require standard Laravel entry point
require __DIR__ . '/../public/index.php';
