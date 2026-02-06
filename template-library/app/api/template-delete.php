<?php

declare(strict_types=1);

require_once __DIR__ . '/api-helpers.php';
require_once __DIR__ . '/../includes/auth-service.php';

api_require_methods(['POST']);

$payload = api_request_data();
$templateId = (string) ($payload['id'] ?? '');
if ($templateId === '') {
    api_error('Template id is required.', 422);
}

$template = get_template($templateId);
if ($template === null) {
    api_error('Template not found.', 404);
}

$currentUser = current_user();
$currentUsername = is_array($currentUser) ? (string) ($currentUser['username'] ?? '') : '';

$action = strtolower(trim((string) ($payload['action'] ?? 'delete')));
if (!in_array($action, ['delete', 'restore'], true)) {
    api_error('Invalid action.', 422);
}

if ($action === 'delete') {
    $template['deleted_at'] = date(DATE_ATOM);
    $template['is_deleted'] = true;
    if ($currentUsername !== '') {
        $template['deleted_by'] = $currentUsername;
    }
} else {
    $template['deleted_at'] = null;
    $template['is_deleted'] = false;
    $template['deleted_by'] = null;
}

save_template($template);
record_template_version($templateId, [
    'action' => $action,
    'user' => $currentUsername ?: null,
]);

api_send_json([
    'message' => $action === 'delete' ? 'Template deleted.' : 'Template restored.',
    'template' => $template,
]);
