<?php

declare(strict_types=1);

require_once __DIR__ . '/api-helpers.php';

api_require_methods(['GET']);

$templates = list_templates();
$filtered = api_filter_templates($templates, $_GET);

$offset = max(0, (int) ($_GET['offset'] ?? 0));
$limit = (int) ($_GET['limit'] ?? 0);

$paginated = api_paginate($filtered, $offset, $limit);

api_send_json([
    'templates' => $paginated,
    'count' => count($paginated),
    'total' => count($filtered),
    'offset' => $offset,
    'limit' => $limit,
]);
