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
    <a class="tl-back-btn" href="index.php">← Back</a>
    <span class="tl-header-sep" aria-hidden="true"></span>
    <h1 class="tl-detail-header-title">Modern Hero Section</h1>
  </header>

  <main class="tl-detail-page">
    <section class="tl-left-col">
      <article class="tl-thumb-card">
        <div class="tl-thumb-card-header">
          <span>Template Preview</span>
          <a class="tl-demo-link" href="#">Live Demo</a>
        </div>
        <div class="tl-template-thumb tl-template-thumb--detail">Preview</div>
      </article>

      <div class="tl-template-title-row">
        <h2 class="tl-template-title">Modern Hero Section</h2>
        <div class="tl-detail-meta">
          <span>By Jane Doe</span>
          <span>• Updated 2 days ago</span>
        </div>
      </div>

      <article class="tl-code-card">
        <div class="tl-tab-group" data-tab-group="template-details-code">
          <div class="tl-code-tabs">
            <div class="tl-tab is-active" data-tab="php">PHP / HTML</div>
            <div class="tl-tab" data-tab="css">CSS</div>
            <div class="tl-tab" data-tab="js">JavaScript</div>
            <button class="tl-copy-btn" type="button" data-copy-template>Copy</button>
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
  hero.addEventListener("click", () => {
    hero.classList.toggle("is-expanded");
  });
}</code></pre>
        </div>
      </article>
    </section>

    <aside class="tl-side-panel">
      <div class="tl-side-card">
        <h3>Template Info</h3>
        <div class="tl-info-row"><span>Author</span><strong>Jane Doe</strong></div>
        <div class="tl-info-row"><span>Status</span><span class="tl-pill">Approved</span></div>
        <div class="tl-info-row"><span>Created</span><strong>April 10, 2024</strong></div>
        <div class="tl-info-row"><span>Last Edited</span><strong>2 days ago</strong></div>
        <a class="tl-btn" href="<?php echo e(api_url('template-download.php')); ?>?id=<?php echo e($templateId); ?>">Download</a>
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
