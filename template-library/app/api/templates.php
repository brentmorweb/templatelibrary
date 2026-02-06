<?php

require_once __DIR__ . '/../includes/template-service.php';

require_method('GET');

$filters = [
    'search' => $_GET['search'] ?? '',
    'category' => $_GET['category'] ?? '',
    'status' => $_GET['status'] ?? '',
    'tag' => $_GET['tag'] ?? '',
    'include_deleted' => $_GET['include_deleted'] ?? false,
];

$templates = load_templates();
$results = filter_templates($templates, $filters);

usort($results, function ($a, $b) {
    return strcmp($b['updated_at'] ?? '', $a['updated_at'] ?? '');
});

send_json([
    'count' => count($results),
    'templates' => $results,
]);
