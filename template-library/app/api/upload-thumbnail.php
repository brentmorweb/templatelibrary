<?php

require_once __DIR__ . '/../includes/template-service.php';

require_method('POST');

if (!isset($_FILES['thumbnail'])) {
    send_json(['error' => 'Missing thumbnail upload.'], 400);
}

$file = $_FILES['thumbnail'];
if ($file['error'] !== UPLOAD_ERR_OK) {
    send_json(['error' => 'Upload failed.'], 400);
}

$extension = pathinfo($file['name'], PATHINFO_EXTENSION);
$extension = $extension !== '' ? strtolower($extension) : 'jpg';
$filename = 'thumb_' . bin2hex(random_bytes(6)) . '.' . $extension;
$destination = THUMBNAIL_PATH . '/' . $filename;

if (!move_uploaded_file($file['tmp_name'], $destination)) {
    send_json(['error' => 'Unable to save thumbnail.'], 500);
}

$relativePath = 'app/uploads/thumbnails/' . $filename;

$templateId = isset($_POST['template_id']) ? (string) $_POST['template_id'] : '';
if ($templateId !== '') {
    save_template([
        'id' => $templateId,
        'thumbnail' => $relativePath,
    ]);
}

send_json([
    'message' => 'Thumbnail uploaded.',
    'path' => $relativePath,
]);
