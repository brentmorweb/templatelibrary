<?php

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/json-store.php';

function load_templates(): array
{
    $data = read_json_file(TEMPLATE_DATA_FILE, []);
    return is_array($data) ? $data : [];
}

function persist_templates(array $templates): void
{
    write_json_file(TEMPLATE_DATA_FILE, array_values($templates));
}

function find_template_index(array $templates, string $id): ?int
{
    foreach ($templates as $index => $template) {
        if (($template['id'] ?? '') === $id) {
            return $index;
        }
    }

    return null;
}

function filter_templates(array $templates, array $filters): array
{
    $search = strtolower(trim($filters['search'] ?? ''));
    $category = strtolower(trim($filters['category'] ?? ''));
    $status = strtolower(trim($filters['status'] ?? ''));
    $tag = strtolower(trim($filters['tag'] ?? ''));
    $includeDeleted = filter_var($filters['include_deleted'] ?? false, FILTER_VALIDATE_BOOL);

    $results = array_filter($templates, function ($template) use ($search, $category, $status, $tag, $includeDeleted) {
        if (!$includeDeleted && !empty($template['deleted_at'])) {
            return false;
        }

        if ($search !== '') {
            $haystack = strtolower(($template['name'] ?? '') . ' ' . ($template['description'] ?? ''));
            if (strpos($haystack, $search) === false) {
                return false;
            }
        }

        if ($category !== '' && strtolower($template['category'] ?? '') !== $category) {
            return false;
        }

        if ($status !== '' && strtolower($template['status'] ?? '') !== $status) {
            return false;
        }

        if ($tag !== '') {
            $tags = array_map('strtolower', normalize_tags($template['tags'] ?? []));
            if (!in_array($tag, $tags, true)) {
                return false;
            }
        }

        return true;
    });

    return array_values($results);
}

function generate_template_id(): string
{
    return 'tpl_' . bin2hex(random_bytes(6));
}

function save_template(array $payload): array
{
    $templates = load_templates();
    $id = isset($payload['id']) ? (string) $payload['id'] : '';
    $index = $id !== '' ? find_template_index($templates, $id) : null;
    $timestamp = now_iso();

    if ($index === null) {
        $id = $id !== '' ? $id : generate_template_id();
        $template = [
            'id' => $id,
            'name' => (string) ($payload['name'] ?? 'Untitled Template'),
            'description' => (string) ($payload['description'] ?? ''),
            'category' => (string) ($payload['category'] ?? ''),
            'status' => (string) ($payload['status'] ?? 'draft'),
            'author' => (string) ($payload['author'] ?? ''),
            'tags' => normalize_tags($payload['tags'] ?? []),
            'thumbnail' => (string) ($payload['thumbnail'] ?? ''),
            'assets' => $payload['assets'] ?? [],
            'metadata' => $payload['metadata'] ?? [],
            'created_at' => $timestamp,
            'updated_at' => $timestamp,
            'deleted_at' => null,
        ];
        $templates[] = $template;
    } else {
        $existing = $templates[$index];
        $template = array_merge($existing, [
            'name' => (string) value_or_default($payload['name'] ?? null, $existing['name'] ?? ''),
            'description' => (string) value_or_default($payload['description'] ?? null, $existing['description'] ?? ''),
            'category' => (string) value_or_default($payload['category'] ?? null, $existing['category'] ?? ''),
            'status' => (string) value_or_default($payload['status'] ?? null, $existing['status'] ?? ''),
            'author' => (string) value_or_default($payload['author'] ?? null, $existing['author'] ?? ''),
            'tags' => normalize_tags(value_or_default($payload['tags'] ?? null, $existing['tags'] ?? [])),
            'thumbnail' => (string) value_or_default($payload['thumbnail'] ?? null, $existing['thumbnail'] ?? ''),
            'assets' => value_or_default($payload['assets'] ?? null, $existing['assets'] ?? []),
            'metadata' => value_or_default($payload['metadata'] ?? null, $existing['metadata'] ?? []),
            'updated_at' => $timestamp,
        ]);
        $templates[$index] = $template;
    }

    persist_templates($templates);

    return $template;
}

function get_template(string $id): ?array
{
    $templates = load_templates();
    $index = find_template_index($templates, $id);

    if ($index === null) {
        return null;
    }

    return $templates[$index];
}

function set_template_deleted(string $id, bool $restore = false): ?array
{
    $templates = load_templates();
    $index = find_template_index($templates, $id);
    if ($index === null) {
        return null;
    }

    $templates[$index]['deleted_at'] = $restore ? null : now_iso();
    $templates[$index]['updated_at'] = now_iso();
    $template = $templates[$index];

    persist_templates($templates);

    return $template;
}
