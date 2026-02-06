<?php

require_once __DIR__ . '/../includes/template-service.php';

require_method('POST');

$payload = read_json_body();
if (empty($payload)) {
    $payload = $_POST;
}

if (!is_array($payload) || empty($payload)) {
    send_json(['error' => 'Missing template payload.'], 400);
}

$template = save_template($payload);

send_json([
    'message' => 'Template saved.',
    'template' => $template,
]);
