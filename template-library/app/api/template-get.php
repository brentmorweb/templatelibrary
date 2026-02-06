<?php

declare(strict_types=1);

require_once __DIR__ . '/api-helpers.php';

api_require_methods(['GET']);

$templateId = (string) ($_GET['id'] ?? '');
if ($templateId === '') {
    api_error('Template id is required.', 422);
}

$template = get_template($templateId);
if ($template === null) {
    api_error('Template not found.', 404);
}

$includeDeleted = filter_var($_GET['include_deleted'] ?? false, FILTER_VALIDATE_BOOLEAN);
if (!$includeDeleted && api_template_is_deleted($template)) {
    api_error('Template not found.', 404);
}

$includeVersions = filter_var($_GET['include_versions'] ?? false, FILTER_VALIDATE_BOOLEAN);
$versions = $includeVersions ? list_template_versions($templateId) : [];

api_send_json([
    'template' => $template,
    'versions' => $versions,
]);
