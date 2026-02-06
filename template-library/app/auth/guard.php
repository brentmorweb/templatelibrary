<?php

declare(strict_types=1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

function auth_user(): ?array
{
    return $_SESSION['auth_user'] ?? null;
}

function is_authenticated(): bool
{
    return auth_user() !== null;
}

function require_auth(): void
{
    if (!is_authenticated()) {
        header('Location: /app/auth/login.php', true, 302);
        exit;
    }
}

function has_role(string $role): bool
{
    $user = auth_user();

    if (!$user || !isset($user['role'])) {
        return false;
    }

    return $user['role'] === $role;
}

function require_role(string $role): void
{
    if (!has_role($role)) {
        http_response_code(403);
        echo 'Forbidden';
        exit;
    }
}
