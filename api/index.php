<?php

// Prepare writable storage directory structure in /tmp for Vercel Serverless
$storageDirectories = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/storage/app/public',
];

foreach ($storageDirectories as $dir) {
    if (!file_exists($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Override Laravel storage and compiled views path to /tmp
putenv('APP_STORAGE=/tmp/storage');
$_ENV['APP_STORAGE'] = '/tmp/storage';
$_SERVER['APP_STORAGE'] = '/tmp/storage';

putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
$_SERVER['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

// Forward Vercel request to Laravel public/index.php
require __DIR__ . '/../public/index.php';
