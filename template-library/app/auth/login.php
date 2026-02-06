<?php

declare(strict_types=1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$usersFile = dirname(__DIR__, 2) . '/data/users.json';
$errors = [];

function load_users(string $file): array
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

function find_user(array $users, string $username): ?array
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

if (!empty($_SESSION['auth_user'])) {
    header('Location: /app/index.php', true, 302);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim((string) ($_POST['username'] ?? ''));
    $password = (string) ($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        $errors[] = 'Please enter both a username and password.';
    } else {
        $users = load_users($usersFile);
        $user = find_user($users, $username);

        if ($user && isset($user['password_hash']) && password_verify($password, (string) $user['password_hash'])) {
            $_SESSION['auth_user'] = [
                'username' => (string) $user['username'],
                'role' => $user['role'] ?? 'user',
            ];

            session_regenerate_id(true);
            header('Location: /app/index.php', true, 302);
            exit;
        }

        $errors[] = 'Invalid credentials.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f6f6;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .login-card {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 360px;
        }

        label {
            display: block;
            margin-top: 1rem;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 0.65rem;
            margin-top: 0.5rem;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            margin-top: 1.5rem;
            padding: 0.75rem;
            border: none;
            border-radius: 4px;
            background: #1c6dd0;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
        }

        .error {
            background: #ffe3e3;
            color: #b00020;
            padding: 0.75rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h1>Sign in</h1>
        <?php if ($errors) : ?>
            <div class="error">
                <?php foreach ($errors as $error) : ?>
                    <div><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form method="post" action="">
            <label for="username">Username</label>
            <input id="username" name="username" type="text" autocomplete="username" required>

            <label for="password">Password</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
