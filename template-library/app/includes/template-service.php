<?php

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/json-store.php';

function template_store_paths(): array
{
    $config = require __DIR__ . '/config.php';

    return [
        'templates' => $config['templates_store'],
        'versions' => $config['versions_path'],
    ];
}

function list_templates(): array
{
    $paths = template_store_paths();

    return read_json_store($paths['templates']);
}

function get_template(string $templateId): ?array
{
    $templates = list_templates();
    foreach ($templates as $template) {
        if (($template['id'] ?? '') === $templateId) {
            return $template;
        }
    }

    return null;
}

function save_template(array $template): void
{
    $paths = template_store_paths();
    $templates = list_templates();
    $templateId = $template['id'] ?? null;

    if ($templateId === null) {
        $template['id'] = uniqid('tpl_', true);
        $templateId = $template['id'];
        $template['created_at'] = $template['created_at'] ?? date(DATE_ATOM);
    }

    $template['updated_at'] = date(DATE_ATOM);

    $updated = false;
    foreach ($templates as $index => $existing) {
        if (($existing['id'] ?? '') === $templateId) {
            $templates[$index] = array_merge($existing, $template);
            $updated = true;
            break;
        }
    }

    if (!$updated) {
        $templates[] = $template;
    }

    write_json_store($paths['templates'], $templates);
}

function record_template_version(string $templateId, array $payload): void
{
    $paths = template_store_paths();
    $versionsPath = rtrim($paths['versions'], '/');
    $versionsFile = sprintf('%s/%s.json', $versionsPath, $templateId);
    $versions = read_json_store($versionsFile);

    $versions[] = [
        'template_id' => $templateId,
        'recorded_at' => date(DATE_ATOM),
        'data' => $payload,
    ];

    write_json_store($versionsFile, $versions);
}

function list_template_versions(string $templateId): array
{
    $paths = template_store_paths();
    $versionsPath = rtrim($paths['versions'], '/');
    $versionsFile = sprintf('%s/%s.json', $versionsPath, $templateId);
    $versions = read_json_store($versionsFile);

    return array_values(array_filter($versions, function (array $version) use ($templateId): bool {
        return ($version['template_id'] ?? '') === $templateId;
    }));
}
