<?php

declare(strict_types=1);

require_once __DIR__ . '/auth/guard.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/footer.php';

require_auth();

$templateId = $_GET['id'] ?? 'promo-221';

render_header('Template Versions');
?>
<div class="tl-app" data-page="versions" data-template-id="<?php echo e($templateId); ?>" data-template-endpoint="/app/api/template-get.php" data-download-endpoint="/app/api/template-download.php" data-restore-endpoint="/app/api/template-save.php">
  <header class="tl-topbar">
    <div class="tl-topbar__inner">
      <div class="tl-brand">MW Template Library</div>
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
        <a href="template.php?id=<?php echo e($templateId); ?>">Template Details</a>
      </div>
      <h1 class="tl-title">Version History</h1>
      <p class="tl-subtitle">Track edits, approvals, and restore points for this template.</p>
    </div>

    <div class="tl-card" style="margin-bottom: 20px;">
      <div class="tl-card__body" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: space-between; align-items: center;">
        <div>
          <div class="tl-detail-meta">
            <span><strong>Template:</strong> Promo Banner</span>
            <span>• Owner: Morgan Lee</span>
            <span>• Status: Approved</span>
          </div>
          <p class="tl-muted" style="margin: 8px 0 0;" data-version-details>Select a version to view details.</p>
        </div>
        <div style="display: flex; gap: 12px; flex-wrap: wrap;">
          <a class="tl-btn tl-btn--ghost" href="/app/api/template-download.php?id=<?php echo e($templateId); ?>" data-version-export>Export Version</a>
          <button class="tl-btn" type="button" data-version-restore>Restore Selected</button>
        </div>
      </div>
    </div>

    <section class="tl-template-grid" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); margin-bottom: 20px;">
      <div class="tl-card">
        <div class="tl-card__body">
          <div class="tl-muted" style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.08em;">Latest Version</div>
          <strong>v2.4.1 (Sep 18, 2024)</strong>
        </div>
      </div>
      <div class="tl-card">
        <div class="tl-card__body">
          <div class="tl-muted" style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.08em;">Total Versions</div>
          <strong>18 revisions</strong>
        </div>
      </div>
      <div class="tl-card">
        <div class="tl-card__body">
          <div class="tl-muted" style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.08em;">Last Edited By</div>
          <strong>Kayla Nguyen</strong>
        </div>
      </div>
      <div class="tl-card">
        <div class="tl-card__body">
          <div class="tl-muted" style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.08em;">Pending Approval</div>
          <strong>v2.4.2 Draft</strong>
        </div>
      </div>
    </section>

    <div class="tl-split">
      <section class="tl-card">
        <div class="tl-card__body" style="display: grid; gap: 12px;">
          <div class="tl-info-row" data-version-row data-version="v2.4.2 Draft" data-version-note="Edited by Kayla Nguyen · Sep 21, 2024 at 9:12 AM">
            <div>
              <strong>v2.4.2 Draft</strong>
              <div class="tl-muted" style="font-size: 0.85rem;">Edited by Kayla Nguyen · Sep 21, 2024 at 9:12 AM</div>
            </div>
            <span class="tl-pill">Draft</span>
          </div>
          <div class="tl-info-row" data-version-row data-version="v2.4.1 Approved" data-version-note="Edited by Morgan Lee · Sep 18, 2024 at 4:40 PM">
            <div>
              <strong>v2.4.1 Approved</strong>
              <div class="tl-muted" style="font-size: 0.85rem;">Edited by Morgan Lee · Sep 18, 2024 at 4:40 PM</div>
            </div>
            <span class="tl-pill" style="background: #e8f8ee; color: #15803d; border-color: #bbf7d0;">Approved</span>
          </div>
          <div class="tl-info-row" data-version-row data-version="v2.3.0 Deprecated" data-version-note="Edited by Ayesha Khan · Aug 30, 2024 at 1:05 PM">
            <div>
              <strong>v2.3.0 Deprecated</strong>
              <div class="tl-muted" style="font-size: 0.85rem;">Edited by Ayesha Khan · Aug 30, 2024 at 1:05 PM</div>
            </div>
            <span class="tl-pill" style="background: #fff7ed; color: #c2410c; border-color: #fed7aa;">Deprecated</span>
          </div>
          <div class="tl-info-row" data-version-row data-version="v2.2.4" data-version-note="Edited by Sofia Patel · Aug 12, 2024 at 11:32 AM">
            <div>
              <strong>v2.2.4 Archived</strong>
              <div class="tl-muted" style="font-size: 0.85rem;">Edited by Sofia Patel · Aug 12, 2024 at 11:32 AM</div>
            </div>
            <span class="tl-pill" style="background: #f3f4f6; color: #4b5563; border-color: #d1d5db;">Archived</span>
          </div>
        </div>
      </section>

      <aside class="tl-card" style="align-self: start;">
        <div class="tl-card__body" style="display: grid; gap: 16px;">
          <div>
            <h3 style="margin-top: 0;">Compare Versions</h3>
            <div class="tl-detail-meta">
              <span><strong>From:</strong> v2.3.0</span>
              <span>•</span>
              <span><strong>To:</strong> v2.4.1</span>
            </div>
            <ul style="list-style: none; margin: 12px 0 0; padding: 0; display: grid; gap: 10px; font-size: 0.9rem;">
              <li class="tl-info-row"><span>HTML blocks changed</span><strong>+3 / -1</strong></li>
              <li class="tl-info-row"><span>CSS tokens updated</span><strong>12 edits</strong></li>
              <li class="tl-info-row"><span>JS behavior changes</span><strong>2</strong></li>
              <li class="tl-info-row"><span>Assets replaced</span><strong>1 image</strong></li>
            </ul>
          </div>
          <div>
            <h3 style="margin-top: 0;">Restore Notes</h3>
            <p class="tl-muted" style="margin: 0 0 10px;">
              Restoring a version will create a new draft. You can review the code before publishing back to Approved status.
            </p>
            <div class="tl-info-row"><span>Audit log</span><strong>5 actions recorded</strong></div>
            <div class="tl-info-row"><span>Last restore</span><strong>v2.1.0 on Jul 18</strong></div>
          </div>
        </div>
      </aside>
    </div>

    <p class="tl-muted" style="margin-top: 16px;">Tip: Use the version selector to compare HTML, CSS, and JS side by side.</p>
  </main>
</div>
<script src="<?php echo e(asset_url('js/app.js')); ?>"></script>
<script src="<?php echo e(asset_url('js/versions.js')); ?>"></script>
<?php
render_footer();
?>
