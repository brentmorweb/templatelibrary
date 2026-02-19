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
    <h1 class="tl-detail-header-title">Modern Hero Section</h1>
  </header>

  <main class="tl-detail-page">
    <section class="tl-left-col">
      <div class="tl-template-title-block">
        <h2 class="tl-template-title">Modern Hero Section</h2>
        <a class="tl-demo-link" href="#">View Demo</a>
      </div>

      <article class="tl-code-card">
        <div class="tl-tab-group" data-tab-group="template-details-code">
          <div class="tl-code-tabs">
            <div class="tl-tab is-active" data-tab="php"><span class="tl-tab-dot tl-tab-dot-php"></span>PHP</div>
            <div class="tl-tab" data-tab="css"><span class="tl-tab-dot tl-tab-dot-css"></span>CSS</div>
            <div class="tl-tab" data-tab="js"><span class="tl-tab-dot tl-tab-dot-js"></span>JS</div>
            <button class="tl-copy-btn" type="button" data-copy-template><span data-copy-label>Copy</span></button>
          </div>
          <pre class="tl-code-panel" data-tab-panel="php" data-template-output><code>&lt;?php if ($hero_title) { ?&gt;
  &lt;h1&gt;&lt;?php echo $hero_title; ?&gt;&lt;/h1&gt;
&lt;?php } ?&gt;

&lt;div class="hero-section"&gt;
  &lt;p&gt;&lt;?php echo $hero_description; ?&gt;&lt;/p&gt;
  &lt;a class="btn btn-primary" href="#"&gt;Learn More&lt;/a&gt;
&lt;/div&gt;</code></pre>
          <pre class="tl-code-panel" data-tab-panel="css" hidden><code>.hero-section {
  display: grid;
  gap: 12px;
  padding: 32px;
  background: linear-gradient(120deg, #e0f2fe, #fff);
  border-radius: 24px;
}

.hero-section .btn-primary {
  background: #2563eb;
  color: #fff;
  padding: 12px 20px;
  border-radius: 999px;
  text-decoration: none;
}</code></pre>
          <pre class="tl-code-panel" data-tab-panel="js" hidden><code>const hero = document.querySelector(".hero-section");

if (hero) {
  hero.addEventListener("click", () =&gt; {
    hero.classList.toggle("is-expanded");
  });
}</code></pre>
        </div>
      </article>
    </section>

    <aside class="tl-side-panel">
      <article class="tl-thumb-card">
        <div class="tl-thumb-card-header"><span class="tl-thumb-card-header-label">Preview</span></div>
        <div class="tl-template-thumb tl-template-thumb--detail">Preview</div>
      </article>

      <a class="tl-download-btn" href="<?php echo e(api_url('template-download.php')); ?>?id=<?php echo e($templateId); ?>">Download All (.zip)</a>

      <div class="tl-side-card">
        <h3>Details</h3>
        <div class="tl-info-row"><span>Status</span><span class="tl-pill"><span class="tl-pill-dot"></span>Published</span></div>
        <div class="tl-info-row"><span>Last edited</span><strong>Feb 17, 2026</strong></div>
        <div class="tl-info-row"><span>Edited by</span><strong>Brent</strong></div>
        <div class="tl-info-row"><span>Created</span><strong>Jan 4, 2026</strong></div>
        <div class="tl-info-row"><span>Created by</span><strong>Brent</strong></div>
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
