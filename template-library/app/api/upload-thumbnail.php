<?php

declare(strict_types=1);

require_once __DIR__ . '/api-helpers.php';

api_require_methods(['POST']);

if (!isset($_FILES['thumbnail'])) {
    api_error('Thumbnail file is required.', 422);
}

$file = $_FILES['thumbnail'];
if (!is_array($file) || $file['error'] !== UPLOAD_ERR_OK) {
    api_error('Upload failed.', 400, ['code' => $file['error'] ?? null]);
}

$originalName = (string) ($file['name'] ?? '');
$extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
$allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

if (!in_array($extension, $allowed, true)) {
    api_error('Unsupported file type.', 415);
}

$config = require __DIR__ . '/../includes/config.php';
$uploadsDir = $config['images_path'] . '/thumbnails';
ensure_dir($uploadsDir);

$filename = uniqid('thumb_', true) . '.' . $extension;
$targetPath = $uploadsDir . '/' . $filename;

if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
    api_error('Failed to move uploaded file.', 500);
}

$publicPath = '/data-images/thumbnails/' . rawurlencode($filename);

api_send_json([
    'message' => 'Thumbnail uploaded.',
    'thumbnail_url' => $publicPath,
    'path' => $targetPath,
]);
