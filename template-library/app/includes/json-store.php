<?php

declare(strict_types=1);

require_once __DIR__ . '/helpers.php';

function read_json_store(string $path): array
{
    if (!file_exists($path)) {
        return [];
    }

    $contents = file_get_contents($path);
    if ($contents === false || $contents === '') {
        return [];
    }

    $decoded = json_decode($contents, true);
    if (!is_array($decoded)) {
        return [];
    }

    return $decoded;
}

function write_json_store(string $path, array $data): void
{
    $directory = dirname($path);
    ensure_dir($directory);

    $encoded = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    if ($encoded === false) {
        return;
    }

    $handle = fopen($path, 'c+');
    if ($handle === false) {
        return;
    }

    if (flock($handle, LOCK_EX)) {
        ftruncate($handle, 0);
        fwrite($handle, $encoded);
        fflush($handle);
        flock($handle, LOCK_UN);
    }

    fclose($handle);
}
