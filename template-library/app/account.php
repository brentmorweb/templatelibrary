<?php

declare(strict_types=1);

require_once __DIR__ . '/auth/guard.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/footer.php';
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/json-store.php';

require_auth();
require_role('admin');

$config = require __DIR__ . '/includes/config.php';
$usersPath = $config['data_path'] . '/users.json';
$users = read_json_store($usersPath);

$errors = [];
$successMessage = null;

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $action = (string) ($_POST['action'] ?? '');

    if ($action === 'add-user') {
        $username = trim((string) ($_POST['username'] ?? ''));
        $name = trim((string) ($_POST['name'] ?? ''));
        $role = strtolower(trim((string) ($_POST['role'] ?? 'user')));
        $password = (string) ($_POST['password'] ?? '');

        if ($username === '' || $name === '' || $password === '') {
            $errors[] = 'Name, username, and password are required to add a user.';
        }

        if (!preg_match('/^[a-zA-Z0-9._-]{3,32}$/', $username)) {
            $errors[] = 'Username must be 3-32 characters and only contain letters, numbers, period, underscore, or dash.';
        }

        if (!in_array($role, ['admin', 'user', 'reviewer', 'author'], true)) {
            $errors[] = 'Please select a valid role.';
        }

        if (strlen($password) < 8) {
            $errors[] = 'Password must be at least 8 characters long.';
        }

        foreach ($users as $user) {
            if (!is_array($user)) {
                continue;
            }

            if (isset($user['username']) && strcasecmp((string) $user['username'], $username) === 0) {
                $errors[] = 'That username already exists.';
                break;
            }
        }

        if (!$errors) {
            $newUser = [
                'id' => 'user_' . substr(bin2hex(random_bytes(6)), 0, 12),
                'username' => $username,
                'name' => $name,
                'role' => $role,
                'password_hash' => password_hash($password, PASSWORD_DEFAULT),
                'created_at' => date(DATE_ATOM),
            ];

            $users[] = $newUser;
            write_json_store($usersPath, $users);
            $successMessage = sprintf('User "%s" was created.', $username);
        }
    }

    if ($action === 'remove-user') {
        $usernameToRemove = trim((string) ($_POST['username'] ?? ''));
        $currentUsername = (string) (auth_user()['username'] ?? '');

        if ($usernameToRemove === '') {
            $errors[] = 'A username is required to remove a user.';
        } elseif (strcasecmp($usernameToRemove, $currentUsername) === 0) {
            $errors[] = 'You cannot remove your currently signed-in admin account.';
        } else {
            $nextUsers = [];
            $removed = false;

            foreach ($users as $user) {
                if (!is_array($user)) {
                    continue;
                }

                $storedUsername = (string) ($user['username'] ?? '');
                if (!$removed && strcasecmp($storedUsername, $usernameToRemove) === 0) {
                    $removed = true;
                    continue;
                }

                $nextUsers[] = $user;
            }

            if (!$removed) {
                $errors[] = 'User not found.';
            } else {
                $users = $nextUsers;
                write_json_store($usersPath, $users);
                $successMessage = sprintf('User "%s" was removed.', $usernameToRemove);
            }
        }
    }
}

render_header('Template Library · Account');
?>
<div class="tl-app" data-page="account">
  <header class="tl-topbar">
    <div class="tl-topbar__inner">
      <div class="tl-brand">Template Library</div>
      <div class="tl-topbar__actions">
        <?php if (is_authenticated()) : ?>
          <a class="tl-btn" href="template-edit.php">New Template</a>
          <a class="tl-user" href="account.php#account" aria-label="View account details">
            Admin User ▾
          </a>
        <?php else : ?>
          <a class="tl-btn" href="auth/login.php">Login</a>
        <?php endif; ?>
      </div>
    </div>
  </header>

  <main class="tl-container">
    <div class="tl-page-header">
      <div class="tl-breadcrumbs">
        <span>‹</span>
        <a href="index.php">Template Library</a>
      </div>
      <h1 class="tl-title">Account</h1>
      <p class="tl-subtitle">Manage your profile, sign-in details, and user accounts.</p>
    </div>

    <section id="account" class="tl-card">
      <div class="tl-card__body" style="display: grid; gap: 18px;">
        <div style="display: flex; align-items: center; gap: 14px;">
          <div>
            <div class="tl-muted" style="font-size: 0.85rem;">Signed in as</div>
            <strong style="font-size: 1.1rem;">Admin User</strong>
            <div class="tl-muted" style="font-size: 0.85rem;">admin@templatelibrary.com</div>
          </div>
        </div>
        <div class="tl-info-row">
          <span>Role</span>
          <strong>Administrator</strong>
        </div>
        <div class="tl-info-row">
          <span>Team</span>
          <strong>Template Operations</strong>
        </div>
        <div class="tl-info-row">
          <span>Last Login</span>
          <strong>Today at 9:12 AM</strong>
        </div>
        <div style="display: flex; gap: 12px; flex-wrap: wrap;">
          <button class="tl-btn" type="button">Update Profile</button>
          <button class="tl-btn tl-btn--ghost" type="button">Change Password</button>
          <a class="tl-btn tl-btn--danger" href="auth/logout.php">Log Out</a>
          <a class="tl-btn tl-btn--ghost" href="index.php">Back to Library</a>
        </div>
      </div>
    </section>

    <section class="tl-card" style="margin-top: 20px;">
      <div class="tl-card__header">
        <h2>User Management</h2>
      </div>
      <div class="tl-card__body" style="display: grid; gap: 14px;">
        <?php if ($successMessage !== null) : ?>
          <div style="padding: 10px 12px; border-radius: 8px; background: #ecfdf3; color: #166534; border: 1px solid #bbf7d0;">
            <?php echo e($successMessage); ?>
          </div>
        <?php endif; ?>
        <?php if ($errors) : ?>
          <div style="padding: 10px 12px; border-radius: 8px; background: #fef2f2; color: #991b1b; border: 1px solid #fecaca;">
            <ul style="margin: 0; padding-left: 20px;">
              <?php foreach ($errors as $error) : ?>
                <li><?php echo e($error); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <form method="post" style="display: grid; gap: 10px; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); align-items: end;">
          <input type="hidden" name="action" value="add-user">
          <label style="display: grid; gap: 6px;">
            <span class="tl-muted">Full name</span>
            <input name="name" required class="tl-input" type="text" placeholder="Jane Reviewer">
          </label>
          <label style="display: grid; gap: 6px;">
            <span class="tl-muted">Username</span>
            <input name="username" required class="tl-input" type="text" placeholder="jane.reviewer">
          </label>
          <label style="display: grid; gap: 6px;">
            <span class="tl-muted">Role</span>
            <select name="role" class="tl-input">
              <option value="author">Author</option>
              <option value="reviewer">Reviewer</option>
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select>
          </label>
          <label style="display: grid; gap: 6px;">
            <span class="tl-muted">Temporary password</span>
            <input name="password" required class="tl-input" type="password" minlength="8" placeholder="Minimum 8 characters">
          </label>
          <button class="tl-btn" type="submit">Add User</button>
        </form>

        <div style="overflow-x: auto;">
          <table style="width: 100%; border-collapse: collapse;">
            <thead>
              <tr style="text-align: left; border-bottom: 1px solid #e5e7eb;">
                <th style="padding: 8px 4px;">Name</th>
                <th style="padding: 8px 4px;">Username</th>
                <th style="padding: 8px 4px;">Role</th>
                <th style="padding: 8px 4px;">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user) : ?>
                <?php
                  $listedUsername = (string) ($user['username'] ?? '');
                  $canRemove = strcasecmp((string) (auth_user()['username'] ?? ''), $listedUsername) !== 0;
                ?>
                <tr style="border-bottom: 1px solid #f1f5f9;">
                  <td style="padding: 10px 4px;"><?php echo e((string) ($user['name'] ?? 'Unknown')); ?></td>
                  <td style="padding: 10px 4px;"><?php echo e($listedUsername); ?></td>
                  <td style="padding: 10px 4px;"><?php echo e((string) ($user['role'] ?? 'user')); ?></td>
                  <td style="padding: 10px 4px;">
                    <?php if ($canRemove) : ?>
                      <form method="post" style="margin: 0;">
                        <input type="hidden" name="action" value="remove-user">
                        <input type="hidden" name="username" value="<?php echo e($listedUsername); ?>">
                        <button class="tl-btn tl-btn--danger" type="submit">Remove</button>
                      </form>
                    <?php else : ?>
                      <span class="tl-muted">Current account</span>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>
</div>
<?php
render_footer();
?>
