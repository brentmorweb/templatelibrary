<?php

declare(strict_types=1);

$baseDir = dirname(__DIR__);

return [
    'env' => getenv('APP_ENV') ?: 'development',
    'base_path' => $baseDir,
    'data_path' => $baseDir . '/../data',
    'uploads_path' => $baseDir . '/uploads',
    'templates_store' => $baseDir . '/../data/templates.json',
    'versions_store' => $baseDir . '/../data/template-versions.json',
];
