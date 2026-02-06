<?php

declare(strict_types=1);

require_once __DIR__ . '/api-helpers.php';

api_require_methods(['GET']);

$templateId = (string) ($_GET['id'] ?? '');
if ($templateId === '') {
    api_error('Template id is required.', 422);
}

$template = get_template($templateId);
if ($template === null || api_template_is_deleted($template)) {
    api_error('Template not found.', 404);
}

$safeId = preg_replace('/[^a-zA-Z0-9_-]+/', '-', $templateId);
$filename = sprintf('template-%s.zip', $safeId);
$exportPayload = [
    'template' => $template,
    'exported_at' => date(DATE_ATOM),
];

if (class_exists('ZipArchive')) {
    $zip = new ZipArchive();
    $tempBase = tempnam(sys_get_temp_dir(), 'tpl_');
    if ($tempBase === false) {
        api_error('Failed to create export package.', 500);
    }

    $zipPath = $tempBase . '.zip';
    if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
        @unlink($tempBase);
        api_error('Failed to create export package.', 500);
    }

    $jsonPayload = json_encode($exportPayload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    if ($jsonPayload === false) {
        $jsonPayload = json_encode(['error' => 'Failed to encode template.']);
    }
    $zip->addFromString('template.json', $jsonPayload);

    $code = $template['code'] ?? [];
    if (is_array($code)) {
        if (!empty($code['html'])) {
            $zip->addFromString('template.php', (string) $code['html']);
        }
        if (!empty($code['css'])) {
            $zip->addFromString('template.css', (string) $code['css']);
        }
        if (!empty($code['js'])) {
            $zip->addFromString('template.js', (string) $code['js']);
        }
    }

    $assets = $template['assets'] ?? [];
    if (is_array($assets)) {
        foreach ($assets as $asset) {
            if (!is_array($asset)) {
                continue;
            }

            $assetName = trim((string) ($asset['filename'] ?? ''));
            if ($assetName === '') {
                continue;
            }

            if (isset($asset['content'])) {
                $zip->addFromString('assets/' . $assetName, (string) $asset['content']);
                continue;
            }

            $assetPath = (string) ($asset['path'] ?? '');
            if ($assetPath !== '' && is_readable($assetPath)) {
                $zip->addFile($assetPath, 'assets/' . $assetName);
            }
        }
    }

    $thumbnail = (string) ($template['thumbnail_url'] ?? '');
    if ($thumbnail !== '') {
        $config = require __DIR__ . '/../includes/config.php';
        $uploadsDir = $config['uploads_path'] . '/thumbnails';
        $basename = basename($thumbnail);
        $thumbnailPath = $uploadsDir . '/' . $basename;
        if (is_readable($thumbnailPath)) {
            $zip->addFile($thumbnailPath, 'assets/' . $basename);
        }
    }

    $zip->close();

    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Content-Length: ' . filesize($zipPath));

    readfile($zipPath);
    @unlink($zipPath);
    @unlink($tempBase);
    exit;
}

header('Content-Type: application/json');
header('Content-Disposition: attachment; filename="' . str_replace('.zip', '.json', $filename) . '"');

echo json_encode($exportPayload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
exit;
