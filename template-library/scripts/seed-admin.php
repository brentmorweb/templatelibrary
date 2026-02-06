<?php

declare(strict_types=1);

require_once __DIR__ . '/../app/includes/helpers.php';
require_once __DIR__ . '/../app/includes/json-store.php';

$rootDir = dirname(__DIR__);
$dataDir = $rootDir . '/data';
$usersFile = $dataDir . '/users.json';
$templatesFile = $dataDir . '/templates.json';
$versionsDir = $dataDir . '/versions';
$auditFile = $dataDir . '/logs/audit.json';

$force = in_array('--force', $argv, true);

function read_json_file(string $path): array
{
    if (!is_readable($path)) {
        return [];
    }

    $contents = trim((string) file_get_contents($path));
    if ($contents === '') {
        return [];
    }

    $decoded = json_decode($contents, true);
    return is_array($decoded) ? $decoded : [];
}

function ensure_empty_or_forced(string $path, bool $force, string $label): void
{
    $existing = read_json_file($path);
    if ($existing !== [] && !$force) {
        fwrite(STDOUT, sprintf("%s already contains data. Re-run with --force to overwrite.\n", $label));
        exit(0);
    }
}

function ensure_versions_dir(string $path, bool $force): void
{
    if (!is_dir($path)) {
        return;
    }

    $files = glob($path . '/*.json') ?: [];
    if ($files === []) {
        return;
    }

    if (!$force) {
        fwrite(STDOUT, "versions directory already contains data. Re-run with --force to overwrite.\n");
        exit(0);
    }

    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }
}

ensure_dir($dataDir);
ensure_dir($dataDir . '/logs');
ensure_dir($versionsDir);

ensure_empty_or_forced($usersFile, $force, 'users.json');
ensure_empty_or_forced($templatesFile, $force, 'templates.json');
ensure_empty_or_forced($auditFile, $force, 'audit.json');
ensure_versions_dir($versionsDir, $force);

$now = date(DATE_ATOM);

$users = [
    [
        'id' => 'user_admin',
        'username' => 'admin',
        'name' => 'Template Admin',
        'role' => 'admin',
        'password_hash' => password_hash('ChangeMe123!', PASSWORD_DEFAULT),
        'created_at' => $now,
    ],
];

$templates = [
    [
        'id' => 'tpl_0001',
        'name' => 'event-landing-page',
        'title' => 'Event Landing Page',
        'description' => 'A flexible landing page template with hero, schedule blocks, and CTA rows.',
        'status' => 'approved',
        'tags' => ['marketing', 'homepage', 'cta'],
        'thumbnail_url' => null,
        'metadata' => [
            'author' => 'Alex Nguyen',
            'html' => '<section class="event-hero">...</section>',
            'css' => '.event-hero { padding: 72px 48px; }',
            'js' => "console.log('CTA clicked');",
        ],
        'created_at' => $now,
        'updated_at' => $now,
        'updated_by' => 'admin',
    ],
    [
        'id' => 'tpl_0002',
        'name' => 'donation-appeal',
        'title' => 'Donation Appeal Panel',
        'description' => 'Compact donor appeal panel with progress bar and CTA button.',
        'status' => 'draft',
        'tags' => ['fundraising', 'component'],
        'thumbnail_url' => null,
        'metadata' => [
            'author' => 'Priya Shah',
            'html' => '<section class="donation-panel">...</section>',
            'css' => '.donation-panel { background: #fff; }',
            'js' => '',
        ],
        'created_at' => $now,
        'updated_at' => $now,
        'updated_by' => 'admin',
    ],
    [
        'id' => 'tpl_0003',
        'name' => 'volunteer-signup',
        'title' => 'Volunteer Signup Hero',
        'description' => 'Hero layout with quick volunteer form and impact stats.',
        'status' => 'in_review',
        'tags' => ['volunteer', 'form'],
        'thumbnail_url' => null,
        'metadata' => [
            'author' => 'Jamie Lee',
            'html' => '<section class="volunteer-hero">...</section>',
            'css' => '.volunteer-hero { display: grid; }',
            'js' => '',
        ],
        'created_at' => $now,
        'updated_at' => $now,
        'updated_by' => 'admin',
    ],
];

$versionsByTemplate = [];
foreach ($templates as $template) {
    $versionsByTemplate[$template['id']][] = [
        'template_id' => $template['id'],
        'recorded_at' => $now,
        'data' => [
            'title' => $template['title'],
            'status' => $template['status'],
            'tags' => $template['tags'],
            'metadata' => $template['metadata'],
        ],
    ];
}

$audit = [
    [
        'event' => 'seed',
        'message' => 'Seeded admin account and starter templates.',
        'created_at' => $now,
        'actor' => 'system',
    ],
];

write_json_store($usersFile, $users);
write_json_store($templatesFile, $templates);
foreach ($versionsByTemplate as $templateId => $versions) {
    $versionsFile = sprintf('%s/%s.json', $versionsDir, $templateId);
    write_json_store($versionsFile, $versions);
}
write_json_store($auditFile, $audit);

fwrite(STDOUT, "Seed complete. Admin login: admin / ChangeMe123!\n");
