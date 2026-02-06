<?php

declare(strict_types=1);

require_once __DIR__ . '/api-helpers.php';
require_once __DIR__ . '/../includes/auth-service.php';
require_once __DIR__ . '/../includes/json-store.php';

api_start_session();

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$config = require __DIR__ . '/../includes/config.php';
$usersFile = $config['data_path'] . '/users.json';

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
    $user = current_user();
    api_send_json([
        'authenticated' => is_authenticated(),
        'user' => $user,
    ]);
}

api_require_methods(['POST']);

$payload = api_request_data();
$action = strtolower((string) ($payload['action'] ?? 'login'));

if ($action === 'logout') {
    logout_user();
    api_send_json(['message' => 'Logged out.']);
}

$username = trim((string) ($payload['username'] ?? ''));
$password = (string) ($payload['password'] ?? '');

if ($username === '' || $password === '') {
    api_error('Username and password are required.', 422);
}

$users = read_json_store($usersFile);
$user = api_find_user($users, $username);

if (!$user || !isset($user['password_hash']) || !password_verify($password, (string) $user['password_hash'])) {
    api_error('Invalid credentials.', 401);
}

$authUser = [
    'username' => (string) $user['username'],
    'role' => $user['role'] ?? 'user',
];

login_user($authUser);
session_regenerate_id(true);

api_send_json([
    'message' => 'Logged in.',
    'user' => $authUser,
]);
