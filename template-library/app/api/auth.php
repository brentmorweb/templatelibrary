<?php

require_once __DIR__ . '/../includes/auth-service.php';

require_method('POST');

$payload = read_json_body();
if (empty($payload)) {
    $payload = $_POST;
}

$email = isset($payload['email']) ? trim((string) $payload['email']) : '';
$password = isset($payload['password']) ? (string) $payload['password'] : '';

if ($email === '' || $password === '') {
    send_json(['error' => 'Email and password are required.'], 400);
}

$user = verify_user($email, $password);
if ($user === null) {
    send_json(['error' => 'Invalid credentials.'], 401);
}

send_json([
    'message' => 'Authenticated.',
    'user' => $user,
]);
