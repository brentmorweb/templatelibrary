<?php

declare(strict_types=1);

require_once __DIR__ . '/auth/guard.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/footer.php';

require_auth();

$templateId = $_GET['id'] ?? '';
$pageTitle = $templateId ? 'Template Library · Edit Template' : 'Template Library · Create Template';

render_header($pageTitle);
?>
<div class="tl-app" data-page="template-edit" data-template-id="<?php echo e($templateId); ?>" data-save-endpoint="/app/api/template-save.php" data-upload-endpoint="/app/api/upload-thumbnail.php">
  <header class="tl-topbar">
    <div class="tl-topbar__inner">
      <div class="tl-brand">Template Library</div>
      <div class="tl-topbar__actions">
        <a class="tl-btn" href="template-edit.php">New Template</a>
        <div class="tl-user">
          <div class="tl-user__avatar">AU</div>
          Admin User ▾
        </div>
      </div>
    </div>
  </header>

  <main class="tl-container">
    <div class="tl-page-header">
      <div class="tl-breadcrumbs">
        <span>‹</span>
        <a href="index.php">Template Library</a>
      </div>
      <h1 class="tl-title"><?php echo $templateId ? 'Edit Template' : 'Create Template'; ?></h1>
      <p class="tl-subtitle" data-editor-status>Draft not saved</p>
    </div>

    <div class="tl-split">
      <section class="tl-card">
        <div class="tl-card__body">
          <form id="template-form" class="tl-form-grid" method="post" action="/app/api/template-save.php" enctype="multipart/form-data" data-template-form>
            <input type="hidden" name="id" value="<?php echo e($templateId); ?>">
            <div class="tl-field">
              <label class="tl-label" for="title">Template Title</label>
              <input class="tl-input" id="title" name="title" type="text" value="Testimonial Section" />
            </div>
            <div class="tl-form-row">
              <div class="tl-field">
                <label class="tl-label" for="description">Description</label>
                <input class="tl-input" id="description" name="description" type="text" value="A testimonial section with customer quotes and photos." />
              </div>
              <div class="tl-field">
                <label class="tl-label" for="tags">Tags</label>
                <input class="tl-input" id="tags" name="tags" type="text" value="testimonial, landing page" />
              </div>
            </div>

            <div class="tl-field">
              <label class="tl-label" for="thumbnail">Upload Thumbnail</label>
              <div class="tl-upload">
                <div class="tl-upload__icon">⬆</div>
                <div>
                  <strong>Upload Thumbnail</strong>
                  <div class="tl-helper">Select an image to represent this template (800×500px recommended)</div>
                </div>
                <label class="tl-btn tl-btn--ghost" style="margin-left: auto;">
                  Browse...
                  <input id="thumbnail" type="file" name="thumbnail" data-editor-upload hidden>
                </label>
              </div>
            </div>

            <div class="tl-field">
              <div class="tl-tabbar">
                <div class="tl-tab is-active">PHP/HTML</div>
                <div class="tl-tab">CSS</div>
                <div class="tl-tab">JavaScript</div>
              </div>
              <pre class="tl-code-panel"><code>&lt;div class="testimonial-section"&gt;
  &lt;h2&gt;What our customers say&lt;/h2&gt;
  &lt;div class="testimonial"&gt;
    &lt;p&gt;“The team was incredible to work with.”&lt;/p&gt;
    &lt;span&gt;Alex Morgan, Director&lt;/span&gt;
  &lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>

            <div class="tl-footer-actions">
              <button class="tl-btn" type="submit" data-editor-save>Save</button>
              <a class="tl-btn tl-btn--ghost" href="index.php">Cancel</a>
            </div>
          </form>
        </div>
      </section>

      <aside class="tl-card" style="align-self: start;">
        <div class="tl-card__body">
          <h3 style="margin-top: 0;">Template Info</h3>
          <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
            <div class="tl-user__avatar">AU</div>
            <div>
              <div class="tl-muted" style="font-size: 0.8rem;">Author</div>
              <strong>Admin User</strong>
            </div>
          </div>
          <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 16px;">
            <span class="tl-tag">testimonial</span>
            <span class="tl-tag">landing page</span>
          </div>
          <div class="tl-field">
            <label class="tl-label" for="status">Status</label>
            <select class="tl-select" id="status" name="status">
              <option value="draft">Draft</option>
              <option value="approved">Approved</option>
            </select>
          </div>
          <div class="tl-info-row">
            <span>Created On:</span>
            <strong>Today</strong>
          </div>
          <div class="tl-footer-actions">
            <button class="tl-btn" type="submit" form="template-form" data-editor-save>Save</button>
            <a class="tl-btn tl-btn--ghost" href="index.php">Cancel</a>
          </div>
        </div>
      </aside>
    </div>
  </main>
</div>
<script src="/app/assets/js/app.js"></script>
<script src="/app/assets/js/edit.js"></script>
<?php
render_footer();
?>
