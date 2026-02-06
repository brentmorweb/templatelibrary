<?php

declare(strict_types=1);

require_once __DIR__ . '/api-helpers.php';
require_once __DIR__ . '/../includes/auth-service.php';

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

$currentUser = current_user();
$currentUsername = is_array($currentUser) ? (string) ($currentUser['username'] ?? '') : '';
$defaultUser = $currentUsername !== '' ? $currentUsername : null;

$tags = $payload['tags'] ?? [];
if (is_string($tags)) {
    $tags = array_filter(array_map('trim', explode(',', $tags)));
}

$metadata = $payload['metadata'] ?? ($existing['metadata'] ?? []);
if (!is_array($metadata)) {
    $metadata = [];
}

$existingCode = $existing['code'] ?? [];
if (!is_array($existingCode)) {
    $existingCode = [];
}

$codeUpdates = [
    'html' => $payload['code_html'] ?? $payload['html'] ?? null,
    'css' => $payload['code_css'] ?? $payload['css'] ?? null,
    'js' => $payload['code_js'] ?? $payload['js'] ?? null,
];

$code = array_merge($existingCode, array_filter($codeUpdates, static function (mixed $value): bool {
    return $value !== null;
}));

$assets = $payload['assets'] ?? ($existing['assets'] ?? []);
if (!is_array($assets)) {
    $assets = [];
}

$template = array_filter([
    'id' => $templateId !== '' ? $templateId : null,
    'name' => trim((string) ($payload['name'] ?? '')),
    'title' => trim((string) ($payload['title'] ?? '')),
    'description' => trim((string) ($payload['description'] ?? '')),
    'status' => $payload['status'] ?? ($existing['status'] ?? 'draft'),
    'tags' => $tags,
    'author' => $payload['author'] ?? ($existing['author'] ?? $defaultUser),
    'created_by' => $payload['created_by'] ?? ($existing['created_by'] ?? $defaultUser),
    'updated_by' => $payload['updated_by'] ?? $defaultUser ?? ($existing['updated_by'] ?? null),
    'thumbnail_url' => $payload['thumbnail_url'] ?? ($existing['thumbnail_url'] ?? null),
    'metadata' => $metadata,
    'code' => $code,
    'assets' => $assets,
], function (mixed $value): bool {
    return $value !== null;
});

if ($existing !== null) {
    $template = array_merge($existing, $template);
}

$template = save_template($template);
record_template_version($template['id'], [
    'payload' => $payload,
    'user' => $defaultUser,
]);

api_send_json([
    'message' => 'Template saved.',
    'template' => $template,
]);
