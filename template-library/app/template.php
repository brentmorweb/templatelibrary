<?php

declare(strict_types=1);

require_once __DIR__ . '/auth/guard.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/footer.php';

$templateId = $_GET['id'] ?? 'hero-001';
$pageTitle = 'Template Details';

render_header($pageTitle);
?>
<div class="tl-app" data-page="template-details" data-template-id="<?php echo e($templateId); ?>" data-template-endpoint="<?php echo e(api_url('template-get.php')); ?>">
  <header class="tl-detail-header">
    <a class="tl-back-btn" href="index.php">
      <span aria-hidden="true">←</span>
      <span>Back to Library</span>
    </a>
    <span class="tl-header-sep" aria-hidden="true"></span>
    <h1 class="tl-detail-header-title" data-template-title>Template Details</h1>
  </header>

  <main class="tl-detail-page">
    <section class="tl-left-col">
      <div class="tl-template-title-block">
        <h2 class="tl-template-title" data-template-title>Template</h2>
      </div>

      <article class="tl-code-card">
        <div class="tl-tab-group" data-tab-group="template-details-code">
          <div class="tl-code-tabs">
            <div class="tl-tab is-active" data-tab="php"><span class="tl-tab-dot tl-tab-dot-php"></span>PHP</div>
            <div class="tl-tab" data-tab="css"><span class="tl-tab-dot tl-tab-dot-css"></span>CSS</div>
            <div class="tl-tab" data-tab="js"><span class="tl-tab-dot tl-tab-dot-js"></span>JS</div>
            <button class="tl-copy-btn" type="button" data-copy-template><span data-copy-label>Copy</span></button>
          </div>
          <pre class="tl-code-panel" data-tab-panel="php" data-template-output><code data-template-code="html"></code></pre>
          <pre class="tl-code-panel" data-tab-panel="css" hidden><code data-template-code="css"></code></pre>
          <pre class="tl-code-panel" data-tab-panel="js" hidden><code data-template-code="js"></code></pre>
        </div>
      </article>
    </section>

    <aside class="tl-side-panel">
      <article class="tl-thumb-card">
        <div class="tl-thumb-card-header"><span class="tl-thumb-card-header-label">Preview</span></div>
        <div class="tl-template-thumb tl-template-thumb--detail" data-template-thumbnail>Preview</div>
      </article>

      <a class="tl-download-btn" href="<?php echo e(api_url('template-download.php')); ?>?id=<?php echo e($templateId); ?>">Download All (.zip)</a>

      <a class="tl-demo-link" href="#" data-template-demo-link target="_blank" rel="noopener noreferrer">View Demo</a>

      <div class="tl-side-card">
        <h3>Details</h3>
        <div class="tl-info-row"><span>Status</span><span class="tl-pill"><span class="tl-pill-dot"></span><span data-template-status>Unknown</span></span></div>
        <div class="tl-info-row"><span>Last edited</span><strong data-template-updated>—</strong></div>
        <div class="tl-info-row"><span>Edited by</span><strong data-template-updated-by>—</strong></div>
        <div class="tl-info-row"><span>Created</span><strong data-template-created>—</strong></div>
        <div class="tl-info-row"><span>Created by</span><strong data-template-created-by>—</strong></div>
        <div class="tl-info-row"><span>Version</span><strong>1.3.0</strong></div>
        <?php if (is_authenticated()) : ?>
          <a class="tl-btn tl-btn--ghost" href="template-edit.php?id=<?php echo e($templateId); ?>">Edit Template</a>
        <?php endif; ?>
      </div>
    </aside>
  </main>
</div>
<script src="<?php echo e(asset_url('js/app.js')); ?>"></script>
<script src="<?php echo e(asset_url('js/details.js')); ?>"></script>
<?php
render_footer();
?>
