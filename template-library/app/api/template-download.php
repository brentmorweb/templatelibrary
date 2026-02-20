<?php

declare(strict_types=1);

require_once __DIR__ . '/api-helpers.php';

function template_export_filename(array $template, string $templateId): string
{
    $sourceFile = trim((string) ($template['metadata']['source_file'] ?? ''));
    if ($sourceFile !== '') {
        return basename($sourceFile);
    }

    $safeId = preg_replace('/[^a-zA-Z0-9._-]+/', '-', $templateId);
    if (!is_string($safeId) || $safeId === '') {
        $safeId = 'template';
    }

    return $safeId . '.php';
}

function template_thumbnail_export_name(string $templateFilename, string $thumbnailPath): string
{
    $extension = pathinfo($thumbnailPath, PATHINFO_EXTENSION);
    if (!is_string($extension) || $extension === '') {
        return $templateFilename . '.png';
    }

    return $templateFilename . '.' . strtolower($extension);
}

function template_thumbnail_source_path(string $thumbnailUrl): ?string
{
    $thumbnailUrl = trim($thumbnailUrl);
    if ($thumbnailUrl === '') {
        return null;
    }

    $config = require __DIR__ . '/../includes/config.php';
    $imagesBaseDir = rtrim((string) ($config['images_path'] ?? ''), '/');
    if ($imagesBaseDir === '') {
        return null;
    }

    $parsedPath = parse_url($thumbnailUrl, PHP_URL_PATH);
    $relativePath = '';
    if (is_string($parsedPath) && $parsedPath !== '') {
        $relativePath = ltrim(rawurldecode($parsedPath), '/');
    }

    $query = parse_url($thumbnailUrl, PHP_URL_QUERY);
    if (is_string($query) && $query !== '') {
        parse_str($query, $queryParams);
        if (isset($queryParams['path'])) {
            $relativePath = ltrim((string) rawurldecode((string) $queryParams['path']), '/');
        }
    }

    if ($relativePath === '') {
        return null;
    }

    if (str_starts_with($relativePath, 'data-images/')) {
        $relativePath = substr($relativePath, strlen('data-images/'));
    }

    $normalizedPath = str_replace('\\', '/', $relativePath);
    if (str_contains($normalizedPath, '../')) {
        return null;
    }

    $candidatePath = $imagesBaseDir . '/' . $normalizedPath;
    if (!is_readable($candidatePath) || !is_file($candidatePath)) {
        return null;
    }

    return $candidatePath;
}

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
$templateFilename = template_export_filename($template, $templateId);
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

    $code = $template['code'] ?? [];
    if (is_array($code)) {
        if (!empty($code['html'])) {
            $zip->addFromString($templateFilename, (string) $code['html']);
        }
        if (!empty($code['css'])) {
            $zip->addFromString(pathinfo($templateFilename, PATHINFO_FILENAME) . '.css', (string) $code['css']);
        }
        if (!empty($code['js'])) {
            $zip->addFromString(pathinfo($templateFilename, PATHINFO_FILENAME) . '.js', (string) $code['js']);
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
        $thumbnailPath = template_thumbnail_source_path($thumbnail);
        if ($thumbnailPath !== null) {
            $thumbnailName = template_thumbnail_export_name($templateFilename, basename($thumbnailPath));
            $zip->addFile($thumbnailPath, 'assets/' . $thumbnailName);
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
