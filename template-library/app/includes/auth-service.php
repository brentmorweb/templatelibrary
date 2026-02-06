<?php

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/json-store.php';

function load_users(): array
{
    $users = read_json_file(USER_DATA_FILE, []);
    return is_array($users) ? $users : [];
}

function find_user_by_email(array $users, string $email): ?array
{
    foreach ($users as $user) {
        if (strtolower($user['email'] ?? '') === strtolower($email)) {
            return $user;
        }
    }

    return null;
}

function verify_user(string $email, string $password): ?array
{
    $users = load_users();
    $user = find_user_by_email($users, $email);
    if ($user === null) {
        return null;
    }

    $hash = $user['password_hash'] ?? '';
    if ($hash === '') {
        return null;
    }

    if (!password_verify($password, $hash)) {
        return null;
    }

    return [
        'id' => $user['id'] ?? null,
        'name' => $user['name'] ?? null,
        'email' => $user['email'] ?? null,
        'role' => $user['role'] ?? null,
    ];
}
