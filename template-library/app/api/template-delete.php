<?php

require_once __DIR__ . '/../includes/template-service.php';

require_method('POST');

$payload = read_json_body();
if (empty($payload)) {
    $payload = $_POST;
}

$id = isset($payload['id']) ? (string) $payload['id'] : '';
if ($id === '') {
    send_json(['error' => 'Missing template id.'], 400);
}

$restore = filter_var($payload['restore'] ?? false, FILTER_VALIDATE_BOOL);
$template = set_template_deleted($id, $restore);

if ($template === null) {
    send_json(['error' => 'Template not found.'], 404);
}

send_json([
    'message' => $restore ? 'Template restored.' : 'Template deleted.',
    'template' => $template,
]);
