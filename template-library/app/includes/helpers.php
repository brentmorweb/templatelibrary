<?php

declare(strict_types=1);

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function format_date(string $date, string $format = 'M j, Y'): string
{
    $timestamp = strtotime($date);
    if ($timestamp === false) {
        return $date;
    }

    return date($format, $timestamp);
}

function is_blank(?string $value): bool
{
    return $value === null || trim($value) === '';
}

function array_get(array $data, string $key, mixed $default = null): mixed
{
    if (array_key_exists($key, $data)) {
        return $data[$key];
    }

    return $default;
}

function ensure_dir(string $path): void
{
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
    }
}

function asset_url(string $path): string
{
    $scriptDir = dirname($_SERVER['SCRIPT_NAME'] ?? '');
    $basePath = rtrim($scriptDir, '/');

    return $basePath . '/assets/' . ltrim($path, '/');
}

function api_url(string $path): string
{
    $scriptDir = dirname($_SERVER['SCRIPT_NAME'] ?? '');
    $basePath = rtrim($scriptDir, '/');

    return $basePath . '/api/' . ltrim($path, '/');
}

function app_base_url(): string
{
    $scriptDir = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? ''), '/');
    if ($scriptDir === '.') {
        $scriptDir = '';
    }

    if (str_ends_with($scriptDir, '/api')) {
        $scriptDir = dirname($scriptDir);
    }

    return rtrim($scriptDir, '/');
}

function resolve_public_asset_url(string $path): string
{
    $trimmed = trim($path);
    if ($trimmed === '') {
        return '';
    }

    if (preg_match('#^(?:https?:)?//#', $trimmed) === 1 || str_starts_with($trimmed, 'data:')) {
        return $trimmed;
    }

    if (!str_starts_with($trimmed, '/')) {
        return $trimmed;
    }

    $appBase = app_base_url();
    if (str_starts_with($trimmed, '/uploads/')) {
        return ($appBase !== '' ? $appBase : '') . $trimmed;
    }

    $decodedPath = rawurldecode($trimmed);
    if (str_starts_with($decodedPath, '/sample tempaltes/')) {
        $relativePath = ltrim($decodedPath, '/');
        return ($appBase !== '' ? $appBase : '') . '/api/image.php?path=' . rawurlencode($relativePath);
    }

    if (str_starts_with($decodedPath, '/data-images/')) {
        $relativePath = ltrim(substr($decodedPath, strlen('/data-images/')), '/');
        return ($appBase !== '' ? $appBase : '') . '/api/image.php?path=' . rawurlencode($relativePath);
    }

    return $trimmed;
}
