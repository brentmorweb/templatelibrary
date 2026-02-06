<?php

declare(strict_types=1);

require_once __DIR__ . '/auth/guard.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/footer.php';

require_auth();

$templateId = $_GET['id'] ?? 'hero-001';
$pageTitle = 'Template Details';

render_header($pageTitle);
?>
<div class="tl-app" data-page="template-details" data-template-id="<?php echo e($templateId); ?>" data-template-endpoint="/app/api/template-get.php">
  <header class="tl-topbar">
    <div class="tl-topbar__inner">
      <div class="tl-brand">MW Template Library</div>
      <div class="tl-topbar__actions">
        <a class="tl-btn" href="template-edit.php?id=<?php echo e($templateId); ?>">New Template</a>
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
        <a href="index.php">MW Template Library</a>
      </div>
      <h1 class="tl-title">Modern Hero Section</h1>
      <div class="tl-detail-meta">
        <span>By <a href="#">Jane Doe</a></span>
        <span>• Created on April 10, 2024</span>
        <span>• Last edited 2 days ago by Jane Doe</span>
      </div>
      <div style="margin-top: 12px; display: flex; gap: 8px; flex-wrap: wrap;">
        <span class="tl-tag">hero</span>
        <span class="tl-tag">landing page</span>
      </div>
    </div>

    <div class="tl-split">
      <section>
        <div class="tl-card">
          <div class="tl-card__body">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px; flex-wrap: wrap; gap: 12px;">
              <div style="display: flex; align-items: center; gap: 10px;">
                <span class="tl-section-title" style="margin: 0;">Template Text</span>
                <span class="tl-pill">Detail</span>
              </div>
              <button class="tl-btn tl-btn--light" type="button" data-copy-template>Copy Code</button>
            </div>

            <div style="display: grid; grid-template-columns: minmax(160px, 220px) minmax(0, 1fr); gap: 16px;">
              <div class="tl-card" style="box-shadow: var(--tl-shadow-sm);">
                <div class="tl-template-thumb" style="height: 120px;">Preview</div>
              </div>
              <div>
                <div class="tl-tabbar">
                  <div class="tl-tab is-active">PHP/HTML</div>
                  <div class="tl-tab">CSS</div>
                  <div class="tl-tab">JavaScript</div>
                </div>
                <pre class="tl-code-panel" data-template-output><code>&lt;?php if ($hero_title) { ?&gt;
  &lt;h1&gt;&lt;?php echo $hero_title; ?&gt;&lt;/h1&gt;
&lt;?php } ?&gt;

&lt;div class="hero-section"&gt;
  &lt;p&gt;&lt;?php echo $hero_description; ?&gt;&lt;/p&gt;
  &lt;a class="btn btn-primary" href="#"&gt;Learn More&lt;/a&gt;
&lt;/div&gt;</code></pre>
              </div>
            </div>

            <div style="display: flex; gap: 12px; margin-top: 16px; flex-wrap: wrap;">
              <a class="tl-btn tl-btn--ghost" href="/app/api/template-download.php?id=<?php echo e($templateId); ?>" data-download-template>Download as Zip</a>
              <form method="post" action="/app/api/template-delete.php" data-delete-template>
                <input type="hidden" name="id" value="<?php echo e($templateId); ?>">
                <button class="tl-btn tl-btn--danger" type="submit">Delete Template</button>
              </form>
            </div>
          </div>
        </div>
      </section>

      <aside class="tl-card" style="align-self: start;">
        <div class="tl-card__body tl-side-card">
          <div style="display: flex; align-items: center; gap: 12px;">
            <div>
              <div class="tl-muted" style="font-size: 0.8rem;">Author</div>
              <strong>Jane Doe</strong>
            </div>
          </div>
          <div class="tl-divider"></div>
          <div class="tl-info-row">
            <span>Status</span>
            <span class="tl-pill" style="background: #e8f8ee; color: #15803d; border-color: #bbf7d0;">Approved</span>
          </div>
          <div class="tl-info-row">
            <span>Created On</span>
            <strong>April 10, 2024</strong>
          </div>
          <div class="tl-info-row">
            <span>Last Edited</span>
            <strong>2 days ago by Jane Doe</strong>
          </div>
          <a class="tl-btn" href="/app/api/template-download.php?id=<?php echo e($templateId); ?>">Download All Files</a>
          <a class="tl-btn tl-btn--ghost" href="template-edit.php?id=<?php echo e($templateId); ?>">Edit Template</a>
          <a class="tl-btn tl-btn--ghost" href="versions.php?id=<?php echo e($templateId); ?>">View Version History</a>
          <form method="post" action="/app/api/template-delete.php">
            <input type="hidden" name="id" value="<?php echo e($templateId); ?>">
            <button class="tl-btn tl-btn--ghost" style="width: 100%; color: #dc2626; border-color: #fecaca;" type="submit">Delete Template</button>
          </form>
        </div>
      </aside>
    </div>
  </main>
</div>
<script src="<?php echo e(asset_url('js/app.js')); ?>"></script>
<script src="<?php echo e(asset_url('js/details.js')); ?>"></script>
<?php
render_footer();
?>
