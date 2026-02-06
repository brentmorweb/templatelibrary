<?php

declare(strict_types=1);

require_once __DIR__ . '/api-helpers.php';

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

$action = strtolower(trim((string) ($payload['action'] ?? 'delete')));
if (!in_array($action, ['delete', 'restore'], true)) {
    api_error('Invalid action.', 422);
}

if ($action === 'delete') {
    $template['deleted_at'] = date(DATE_ATOM);
    $template['is_deleted'] = true;
} else {
    $template['deleted_at'] = null;
    $template['is_deleted'] = false;
}

save_template($template);
record_template_version($templateId, ['action' => $action]);

api_send_json([
    'message' => $action === 'delete' ? 'Template deleted.' : 'Template restored.',
    'template' => $template,
]);
