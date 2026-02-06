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
    $author = trim((string) ($filters['author'] ?? ''));
    $createdFrom = api_parse_date($filters['created_from'] ?? null);
    $createdTo = api_parse_date($filters['created_to'] ?? null);
    $updatedFrom = api_parse_date($filters['updated_from'] ?? null);
    $updatedTo = api_parse_date($filters['updated_to'] ?? null);
    $includeDeleted = filter_var($filters['include_deleted'] ?? false, FILTER_VALIDATE_BOOLEAN);

    $filtered = array_filter($templates, function (array $template) use (
        $query,
        $status,
        $tag,
        $author,
        $createdFrom,
        $createdTo,
        $updatedFrom,
        $updatedTo,
        $includeDeleted
    ): bool {
        if (!$includeDeleted && api_template_is_deleted($template)) {
            return false;
        }

        if ($status !== '' && ($template['status'] ?? '') !== $status) {
            return false;
        }

        if ($author !== '') {
            $templateAuthor = (string) ($template['author'] ?? $template['created_by'] ?? '');
            if ($templateAuthor === '' || strcasecmp($templateAuthor, $author) !== 0) {
                return false;
            }
        }

        if ($tag !== '') {
            $tags = $template['tags'] ?? [];
            if (!is_array($tags) || !in_array($tag, $tags, true)) {
                return false;
            }
        }

        $createdAt = api_parse_date($template['created_at'] ?? null);
        if ($createdFrom !== null && ($createdAt === null || $createdAt < $createdFrom)) {
            return false;
        }

        if ($createdTo !== null && ($createdAt === null || $createdAt > $createdTo)) {
            return false;
        }

        $updatedAt = api_parse_date($template['updated_at'] ?? null);
        if ($updatedFrom !== null && ($updatedAt === null || $updatedAt < $updatedFrom)) {
            return false;
        }

        if ($updatedTo !== null && ($updatedAt === null || $updatedAt > $updatedTo)) {
            return false;
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

function api_sort_templates(array $templates, string $sort, string $direction): array
{
    $sortKey = strtolower(trim($sort));
    $direction = strtolower(trim($direction)) === 'asc' ? 'asc' : 'desc';

    $value = function (array $template) use ($sortKey): string|int {
        return match ($sortKey) {
            'title' => (string) ($template['title'] ?? $template['name'] ?? ''),
            'created' => strtotime((string) ($template['created_at'] ?? '')) ?: 0,
            'updated' => strtotime((string) ($template['updated_at'] ?? '')) ?: 0,
            default => 0,
        };
    };

    usort($templates, function (array $a, array $b) use ($value, $direction): int {
        $first = $value($a);
        $second = $value($b);

        if ($first === $second) {
            return 0;
        }

        if ($direction === 'asc') {
            return $first < $second ? -1 : 1;
        }

        return $first > $second ? -1 : 1;
    });

    return $templates;
}

function api_paginate(array $items, int $offset, int $limit): array
{
    if ($limit <= 0) {
        return $items;
    }

    return array_slice($items, $offset, $limit);
}

function api_parse_date(mixed $value): ?int
{
    if ($value === null || $value === '') {
        return null;
    }

    $timestamp = strtotime((string) $value);
    if ($timestamp === false) {
        return null;
    }

    return $timestamp;
}
