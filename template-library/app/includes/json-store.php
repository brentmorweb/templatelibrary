<?php

require_once __DIR__ . '/config.php';

function read_json_file(string $path, $default = []): array
{
    if (!file_exists($path)) {
        return is_array($default) ? $default : [];
    }

    $contents = file_get_contents($path);
    if ($contents === false || trim($contents) === '') {
        return is_array($default) ? $default : [];
    }

    $decoded = json_decode($contents, true);
    if (!is_array($decoded)) {
        return is_array($default) ? $default : [];
    }

    return $decoded;
}

function write_json_file(string $path, array $data): void
{
    $payload = json_encode($data, JSON_PRETTY_PRINT);
    if ($payload === false) {
        throw new RuntimeException('Failed to encode JSON.');
    }

    $temp = $path . '.' . uniqid('tmp', true);
    if (file_put_contents($temp, $payload, LOCK_EX) === false) {
        throw new RuntimeException('Failed to write JSON data.');
    }

    if (!rename($temp, $path)) {
        throw new RuntimeException('Failed to persist JSON data.');
    }
}
