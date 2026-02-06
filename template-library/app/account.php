<?php

declare(strict_types=1);

require_once __DIR__ . '/auth/guard.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/footer.php';

require_auth();

render_header('Template Library · Account');
?>
<div class="tl-app" data-page="account">
  <header class="tl-topbar">
    <div class="tl-topbar__inner">
      <div class="tl-brand">Template Library</div>
      <div class="tl-topbar__actions">
        <a class="tl-btn" href="template-edit.php">New Template</a>
        <a class="tl-user" href="account.php#account" aria-label="View account details">
          Admin User ▾
        </a>
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
      <p class="tl-subtitle">Manage your profile, permissions, and sign-in details.</p>
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
          <a class="tl-btn tl-btn--ghost" href="index.php">Back to Library</a>
        </div>
      </div>
    </section>
  </main>
</div>
<?php
render_footer();
?>
