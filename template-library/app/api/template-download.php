<?php

declare(strict_types=1);

require_once __DIR__ . '/api-helpers.php';

api_require_methods(['GET']);

$templateId = (string) ($_GET['id'] ?? '');
if ($templateId === '') {
    api_error('Template id is required.', 422);
}

$template = get_template($templateId);
if ($template === null || api_template_is_deleted($template)) {
    api_error('Template not found.', 404);
}

$filename = sprintf('template-%s.json', preg_replace('/[^a-zA-Z0-9_-]+/', '-', $templateId));

header('Content-Type: application/json');
header('Content-Disposition: attachment; filename="' . $filename . '"');

echo json_encode([
    'template' => $template,
    'exported_at' => date(DATE_ATOM),
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
exit;
