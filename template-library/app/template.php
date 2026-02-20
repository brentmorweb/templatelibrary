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
          <div class="tl-code-tabs" role="tablist" aria-label="Template code tabs">
            <button class="tl-tab is-active" type="button" data-tab="php" role="tab" aria-selected="true"><span class="tl-tab-dot tl-tab-dot-php"></span>PHP</button>
            <button class="tl-tab" type="button" data-tab="css" role="tab" aria-selected="false" tabindex="-1"><span class="tl-tab-dot tl-tab-dot-css"></span>CSS</button>
            <button class="tl-tab" type="button" data-tab="js" role="tab" aria-selected="false" tabindex="-1"><span class="tl-tab-dot tl-tab-dot-js"></span>JS</button>
            <button class="tl-copy-btn" type="button" data-copy-template><span data-copy-label>Copy</span></button>
          </div>
          <pre class="tl-code-panel" id="tab-panel-php" data-tab-panel="php" role="tabpanel" data-template-output><code data-template-code="html"></code></pre>
          <pre class="tl-code-panel" id="tab-panel-css" data-tab-panel="css" role="tabpanel" hidden><code data-template-code="css"></code></pre>
          <pre class="tl-code-panel" id="tab-panel-js" data-tab-panel="js" role="tabpanel" hidden><code data-template-code="js"></code></pre>
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
        <div class="tl-info-row tl-info-row--description"><span>Description</span><strong data-template-description>—</strong></div>
        <div class="tl-info-row"><span>Status</span><span class="tl-pill"><span class="tl-pill-dot"></span><span data-template-status>Unknown</span></span></div>
        <div class="tl-info-row"><span>Last edited</span><strong data-template-updated>—</strong></div>
        <div class="tl-info-row"><span>Edited by</span><strong data-template-updated-by>—</strong></div>
        <div class="tl-info-row"><span>Created</span><strong data-template-created>—</strong></div>
        <div class="tl-info-row"><span>Created by</span><strong data-template-created-by>—</strong></div>
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
