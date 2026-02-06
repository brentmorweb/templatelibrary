<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/template-service.php';

function api_start_session(): void
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
}

function api_send_json(array $payload, int $status = 200): void
{
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    exit;
}

function api_error(string $message, int $status = 400, array $extra = []): void
{
    api_send_json(array_merge(['error' => $message], $extra), $status);
}

function api_require_methods(array $methods): void
{
    $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
    if (!in_array($method, $methods, true)) {
        api_error('Method not allowed.', 405, ['allowed' => $methods]);
    }
}

function api_read_json_body(): array
{
    $raw = file_get_contents('php://input');
    if ($raw === false || trim($raw) === '') {
        return [];
    }

    $decoded = json_decode($raw, true);
    return is_array($decoded) ? $decoded : [];
}

function api_request_data(): array
{
    $json = api_read_json_body();
    if ($json !== []) {
        return $json;
    }

    return $_POST;
}

function api_template_is_deleted(array $template): bool
{
    if (!empty($template['deleted_at'])) {
        return true;
    }

    return !empty($template['is_deleted']);
}

function api_filter_templates(array $templates, array $filters): array
{
    $query = strtolower(trim((string) ($filters['q'] ?? '')));
    $status = trim((string) ($filters['status'] ?? ''));
    $tag = trim((string) ($filters['tag'] ?? ''));
    $includeDeleted = filter_var($filters['include_deleted'] ?? false, FILTER_VALIDATE_BOOLEAN);

    $filtered = array_filter($templates, function (array $template) use ($query, $status, $tag, $includeDeleted): bool {
        if (!$includeDeleted && api_template_is_deleted($template)) {
            return false;
        }

        if ($status !== '' && ($template['status'] ?? '') !== $status) {
            return false;
        }

        if ($tag !== '') {
            $tags = $template['tags'] ?? [];
            if (!is_array($tags) || !in_array($tag, $tags, true)) {
                return false;
            }
        }

        if ($query === '') {
            return true;
        }

        $haystack = strtolower(implode(' ', [
            (string) ($template['name'] ?? ''),
            (string) ($template['title'] ?? ''),
            (string) ($template['description'] ?? ''),
            is_array($template['tags'] ?? null) ? implode(' ', $template['tags']) : '',
        ]));

        return str_contains($haystack, $query);
    });

    return array_values($filtered);
}

function api_paginate(array $items, int $offset, int $limit): array
{
    if ($limit <= 0) {
        return $items;
    }

    return array_slice($items, $offset, $limit);
}
