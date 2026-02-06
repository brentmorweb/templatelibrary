<?php

require_once __DIR__ . '/../includes/template-service.php';

require_method('GET');

$id = isset($_GET['id']) ? (string) $_GET['id'] : '';
if ($id === '') {
    send_json(['error' => 'Missing template id.'], 400);
}

$template = get_template($id);
if ($template === null) {
    send_json(['error' => 'Template not found.'], 404);
}

send_json(['template' => $template]);
