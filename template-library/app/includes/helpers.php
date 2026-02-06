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

function app_base_url(): string
{
    $scriptDir = dirname($_SERVER['SCRIPT_NAME'] ?? '');
    $basePath = rtrim($scriptDir, '/');

    if (str_ends_with($basePath, '/api') || str_ends_with($basePath, '/auth')) {
        $basePath = dirname($basePath);
    }

    return $basePath;
}

function asset_url(string $path): string
{
    return app_base_url() . '/assets/' . ltrim($path, '/');
}

function api_url(string $path): string
{
    return app_base_url() . '/api/' . ltrim($path, '/');
}
