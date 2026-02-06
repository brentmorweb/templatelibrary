<?php

declare(strict_types=1);

require_once __DIR__ . '/api-helpers.php';

api_start_session();

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$usersFile = dirname(__DIR__, 2) . '/data/users.json';

function api_load_users(string $file): array
{
    if (!is_readable($file)) {
        return [];
    }

    $contents = trim((string) file_get_contents($file));
    if ($contents === '') {
        return [];
    }

    $decoded = json_decode($contents, true);
    return is_array($decoded) ? $decoded : [];
}

function api_find_user(array $users, string $username): ?array
{
    foreach ($users as $user) {
        if (!is_array($user) || !isset($user['username'])) {
            continue;
        }

        if (hash_equals((string) $user['username'], $username)) {
            return $user;
        }
    }

    return null;
}

if ($method === 'GET') {
    api_send_json([
        'authenticated' => !empty($_SESSION['auth_user']),
        'user' => $_SESSION['auth_user'] ?? null,
    ]);
}

api_require_methods(['POST']);

$payload = api_request_data();
$action = strtolower((string) ($payload['action'] ?? 'login'));

if ($action === 'logout') {
    unset($_SESSION['auth_user']);
    api_send_json(['message' => 'Logged out.']);
}

$username = trim((string) ($payload['username'] ?? ''));
$password = (string) ($payload['password'] ?? '');

if ($username === '' || $password === '') {
    api_error('Username and password are required.', 422);
}

$users = api_load_users($usersFile);
$user = api_find_user($users, $username);

if (!$user || !isset($user['password_hash']) || !password_verify($password, (string) $user['password_hash'])) {
    api_error('Invalid credentials.', 401);
}

$_SESSION['auth_user'] = [
    'username' => (string) $user['username'],
    'role' => $user['role'] ?? 'user',
];

session_regenerate_id(true);

api_send_json([
    'message' => 'Logged in.',
    'user' => $_SESSION['auth_user'],
]);
