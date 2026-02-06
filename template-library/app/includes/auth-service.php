<?php

declare(strict_types=1);

function start_session(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function current_user(): ?array
{
    start_session();

    return $_SESSION['user'] ?? null;
}

function is_authenticated(): bool
{
    return current_user() !== null;
}

function require_authentication(): void
{
    if (!is_authenticated()) {
        header('Location: /app/auth/login.php');
        exit;
    }
}

function login_user(array $user): void
{
    start_session();
    $_SESSION['user'] = $user;
}

function logout_user(): void
{
    start_session();
    unset($_SESSION['user']);
}

function user_has_role(string $role): bool
{
    $user = current_user();
    if ($user === null) {
        return false;
    }

    $roles = $user['roles'] ?? [];
    if (!is_array($roles)) {
        return false;
    }

    return in_array($role, $roles, true);
}
