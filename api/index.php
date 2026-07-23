<?php

// Enable debug reporting if needed
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Prepare writable storage & cache directory structure in /tmp for Vercel Serverless
$storageDirectories = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/storage/app/public',
    '/tmp/bootstrap/cache',
    '/tmp/database',
];

foreach ($storageDirectories as $dir) {
    if (!file_exists($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Create empty SQLite database file in /tmp if using SQLite
$sqliteDb = '/tmp/database/database.sqlite';
if (!file_exists($sqliteDb)) {
    touch($sqliteDb);
}

// Override Laravel storage and compiled views path to /tmp
putenv('APP_STORAGE=/tmp/storage');
$_ENV['APP_STORAGE'] = '/tmp/storage';
$_SERVER['APP_STORAGE'] = '/tmp/storage';

putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
$_SERVER['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

// Override bootstrap cache paths to /tmp
putenv('APP_SERVICES_CACHE=/tmp/bootstrap/cache/services.php');
$_ENV['APP_SERVICES_CACHE'] = '/tmp/bootstrap/cache/services.php';

putenv('APP_PACKAGES_CACHE=/tmp/bootstrap/cache/packages.php');
$_ENV['APP_PACKAGES_CACHE'] = '/tmp/bootstrap/cache/packages.php';

putenv('APP_CONFIG_CACHE=/tmp/bootstrap/cache/config.php');
$_ENV['APP_CONFIG_CACHE'] = '/tmp/bootstrap/cache/config.php';

putenv('APP_ROUTES_CACHE=/tmp/bootstrap/cache/routes.php');
$_ENV['APP_ROUTES_CACHE'] = '/tmp/bootstrap/cache/routes.php';

putenv('APP_EVENTS_CACHE=/tmp/bootstrap/cache/events.php');
$_ENV['APP_EVENTS_CACHE'] = '/tmp/bootstrap/cache/events.php';

// Override Session Driver to cookie & SQLite database path to /tmp
putenv("SESSION_DRIVER=cookie");
$_ENV['SESSION_DRIVER'] = 'cookie';

putenv("DB_CONNECTION=sqlite");
$_ENV['DB_CONNECTION'] = 'sqlite';

putenv("DB_DATABASE={$sqliteDb}");
$_ENV['DB_DATABASE'] = $sqliteDb;

// Turn off debug mode for clean display
putenv('APP_DEBUG=false');
$_ENV['APP_DEBUG'] = 'false';

// Forward Vercel request to Laravel public/index.php
require __DIR__ . '/../public/index.php';
