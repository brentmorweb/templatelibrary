<?php

declare(strict_types=1);

require_once __DIR__ . '/api-helpers.php';

api_require_methods(['GET']);

$relativePath = trim((string) ($_GET['path'] ?? ''));
if ($relativePath === '') {
    http_response_code(404);
    exit;
}

$relativePath = ltrim(str_replace('\\', '/', $relativePath), '/');
if ($relativePath === '' || str_contains($relativePath, '..')) {
    http_response_code(404);
    exit;
}

$config = require __DIR__ . '/../includes/config.php';
$imagesBase = realpath($config['images_path']);
if ($imagesBase === false) {
    http_response_code(404);
    exit;
}

$target = realpath($imagesBase . '/' . $relativePath);
if ($target === false || !str_starts_with($target, $imagesBase . DIRECTORY_SEPARATOR) || !is_file($target)) {
    http_response_code(404);
    exit;
}

$mime = mime_content_type($target);
if (!is_string($mime) || $mime === '') {
    $mime = 'application/octet-stream';
}

header('Content-Type: ' . $mime);
header('Cache-Control: public, max-age=86400');
readfile($target);
exit;
