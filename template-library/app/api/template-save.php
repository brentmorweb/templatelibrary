<?php

declare(strict_types=1);

require_once __DIR__ . '/api-helpers.php';

api_require_methods(['POST', 'PUT']);

$payload = api_request_data();
$templateId = (string) ($payload['id'] ?? '');

if (($payload['name'] ?? '') === '' && ($payload['title'] ?? '') === '') {
    api_error('Template name or title is required.', 422);
}

$existing = $templateId !== '' ? get_template($templateId) : null;
if ($existing === null && $templateId !== '') {
    api_error('Template not found.', 404);
}

$tags = $payload['tags'] ?? [];
if (is_string($tags)) {
    $tags = array_filter(array_map('trim', explode(',', $tags)));
}

$template = array_filter([
    'id' => $templateId !== '' ? $templateId : null,
    'name' => trim((string) ($payload['name'] ?? '')),
    'title' => trim((string) ($payload['title'] ?? '')),
    'description' => trim((string) ($payload['description'] ?? '')),
    'status' => $payload['status'] ?? ($existing['status'] ?? 'draft'),
    'tags' => $tags,
    'thumbnail_url' => $payload['thumbnail_url'] ?? ($existing['thumbnail_url'] ?? null),
    'metadata' => $payload['metadata'] ?? ($existing['metadata'] ?? []),
    'updated_by' => $payload['updated_by'] ?? ($existing['updated_by'] ?? null),
], function (mixed $value): bool {
    return $value !== null;
});

if ($existing !== null) {
    $template = array_merge($existing, $template);
}

save_template($template);
record_template_version($template['id'], $payload);

api_send_json([
    'message' => 'Template saved.',
    'template' => $template,
]);
