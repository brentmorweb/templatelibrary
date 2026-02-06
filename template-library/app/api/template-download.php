<?php

require_once __DIR__ . '/../includes/template-service.php';
require_once __DIR__ . '/../includes/json-store.php';

require_method('GET');

$id = isset($_GET['id']) ? (string) $_GET['id'] : '';
if ($id === '') {
    send_json(['error' => 'Missing template id.'], 400);
}

$template = get_template($id);
if ($template === null) {
    send_json(['error' => 'Template not found.'], 404);
}

$zipName = 'template-' . $id . '-' . date('YmdHis') . '.zip';
$zipPath = EXPORT_PATH . '/' . $zipName;

$zip = new ZipArchive();
if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
    send_json(['error' => 'Unable to create export package.'], 500);
}

$zip->addFromString('template.json', json_encode($template, JSON_PRETTY_PRINT));

$assets = $template['assets'] ?? [];
if (is_array($assets)) {
    foreach ($assets as $asset) {
        $path = '';
        $name = '';
        if (is_array($asset)) {
            $path = $asset['path'] ?? '';
            $name = $asset['name'] ?? '';
        } elseif (is_string($asset)) {
            $path = $asset;
        }

        if ($path === '') {
            continue;
        }

        $resolved = str_starts_with($path, '/') ? $path : BASE_PATH . '/' . ltrim($path, '/');
        if (!file_exists($resolved)) {
            continue;
        }

        $entryName = $name !== '' ? $name : basename($resolved);
        $zip->addFile($resolved, 'assets/' . $entryName);
    }
}

$zip->close();

header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename="' . $zipName . '"');
header('Content-Length: ' . filesize($zipPath));
readfile($zipPath);
exit;
