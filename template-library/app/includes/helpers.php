<?php

require_once __DIR__ . '/config.php';

function send_json($data, int $status = 200): void
{
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);
    exit;
}

function require_method(string $method): void
{
    if (strtoupper($_SERVER['REQUEST_METHOD'] ?? '') !== strtoupper($method)) {
        send_json(['error' => 'Method not allowed.'], 405);
    }
}

function read_json_body(): array
{
    $raw = file_get_contents('php://input');
    if ($raw === false || trim($raw) === '') {
        return [];
    }

    $decoded = json_decode($raw, true);
    if (!is_array($decoded)) {
        send_json(['error' => 'Invalid JSON payload.'], 400);
    }

    return $decoded;
}

function value_or_default($value, $default)
{
    return $value ?? $default;
}

function normalize_tags($value): array
{
    if (is_string($value)) {
        $value = array_filter(array_map('trim', explode(',', $value)));
    }

    if (!is_array($value)) {
        return [];
    }

    return array_values(array_filter(array_map('strval', $value)));
}

function now_iso(): string
{
    return gmdate('c');
}
