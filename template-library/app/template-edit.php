<?php

declare(strict_types=1);

require_once __DIR__ . '/auth/guard.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/footer.php';
require_once __DIR__ . '/includes/template-service.php';

require_auth();

$templateId = $_GET['id'] ?? '';
$isNewTemplate = $templateId === '';
$template = $isNewTemplate ? null : get_template($templateId);

if (!$isNewTemplate && $template === null) {
  http_response_code(404);
  render_header('Template not found');
?>
  <main class="tl-container">
    <section class="tl-card" style="margin-top: 32px;">
      <div class="tl-card__body">
        <h1 style="margin-top: 0;">Template not found</h1>
        <p>The requested template could not be found.</p>
        <a class="tl-btn" href="index.php">Back to Library</a>
      </div>
    </section>
  </main>
<?php
  render_footer();
  exit;
}

$pageTitle = $templateId ? 'MW Template Library · Edit Template' : 'MW Template Library · Create Template';
$templateTitle = (string) ($template['title'] ?? $template['name'] ?? '');
$templateDescription = (string) ($template['description'] ?? '');
$templateTagsArray = $template['tags'] ?? [];
if (!is_array($templateTagsArray)) {
  $templateTagsArray = [];
}
$templateTags = implode(', ', $templateTagsArray);
$templateCode = $template['code'] ?? [];
if (!is_array($templateCode)) {
  $templateCode = [];
}
$templateCodeHtml = (string) ($templateCode['html'] ?? '');
$templateCodeCss = (string) ($templateCode['css'] ?? '');
$templateCodeJs = (string) ($templateCode['js'] ?? '');
$templateTagList = $templateTagsArray;
$currentUser = current_user();
$currentUsername = is_array($currentUser) ? (string) ($currentUser['username'] ?? '') : '';
$templateAuthor = (string) ($template['author'] ?? $template['created_by'] ?? $currentUsername);
$templateStatus = (string) ($template['status'] ?? 'draft');
$templateDemoLink = (string) ($template['demo_url'] ?? '');

render_header($pageTitle);
?>
<div class="tl-app" data-page="template-edit" data-template-id="<?php echo e($templateId); ?>" data-save-endpoint="<?php echo e(api_url('template-save.php')); ?>" data-upload-endpoint="<?php echo e(api_url('upload-thumbnail.php')); ?>">
  <header class="tl-topbar">
    <div class="tl-topbar__inner">
      <div class="tl-brand">MW Template Library</div>
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
        <a href="index.php">MW Template Library</a>
      </div>
      <h1 class="tl-title"><?php echo $templateId ? 'Edit Template' : 'Create Template'; ?></h1>
      <p class="tl-subtitle" data-editor-status>Draft not saved</p>
    </div>

    <div class="tl-split">
      <section class="tl-card">
        <div class="tl-card__body">
          <form id="template-form" class="tl-form-grid" method="post" action="<?php echo e(api_url('template-save.php')); ?>" enctype="multipart/form-data" data-template-form>
            <input type="hidden" name="id" value="<?php echo e($templateId); ?>">
            <input type="hidden" name="thumbnail_url" value="<?php echo e((string) ($template['thumbnail_url'] ?? '')); ?>" data-editor-thumbnail-url>
            <div class="tl-field">
              <label class="tl-label" for="title">Template Title</label>
              <input class="tl-input" id="title" name="title" type="text" value="<?php echo e($templateTitle); ?>" />
            </div>
            <div class="tl-form-row">
              <div class="tl-field">
                <label class="tl-label" for="author">Author</label>
                <input class="tl-input" id="author" name="author" type="text" value="<?php echo e($templateAuthor); ?>" readonly />
              </div>
              <div class="tl-field">
                <label class="tl-label" for="demo_url">Demo Link</label>
                <input class="tl-input" id="demo_url" name="demo_url" type="url" value="<?php echo e($templateDemoLink); ?>" placeholder="https://example.com/demo" />
              </div>
            </div>

            <div class="tl-form-row">
              <div class="tl-field">
                <label class="tl-label" for="description">Description</label>
                <input class="tl-input" id="description" name="description" type="text" value="<?php echo e($templateDescription); ?>" />
              </div>
              <?php if (!$isNewTemplate) : ?>
                <div class="tl-field">
                  <label class="tl-label" for="tags">Tags</label>
                  <input class="tl-input" id="tags" name="tags" type="text" value="<?php echo e($templateTags); ?>" />
                </div>
              <?php endif; ?>
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
              <div class="tl-tab-group" data-tab-group="template-edit-code">
                <div class="tl-tabbar">
                  <div class="tl-tab is-active" data-tab="php">PHP/HTML</div>
                  <div class="tl-tab" data-tab="css">CSS</div>
                  <div class="tl-tab" data-tab="js">JavaScript</div>
                </div>
                <textarea class="tl-code-panel" data-tab-panel="php" name="code_html"><?php echo e($templateCodeHtml); ?></textarea>
                <textarea class="tl-code-panel" data-tab-panel="css" name="code_css" hidden><?php echo e($templateCodeCss); ?></textarea>
                <textarea class="tl-code-panel" data-tab-panel="js" name="code_js" hidden><?php echo e($templateCodeJs); ?></textarea>
              </div>
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
            <div>
              <div class="tl-muted" style="font-size: 0.8rem;">Author</div>
              <strong><?php echo $templateAuthor !== '' ? e($templateAuthor) : '—'; ?></strong>
            </div>
          </div>
          <?php if (!empty($templateTagList)) : ?>
            <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 16px;">
              <?php foreach ($templateTagList as $tag) : ?>
                <span class="tl-tag"><?php echo e($tag); ?></span>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
          <div class="tl-field">
            <label class="tl-label" for="status">Status</label>
            <select class="tl-select" id="status" name="status" form="template-form">
              <option value="" <?php echo $templateStatus === '' ? 'selected' : ''; ?>>Select status</option>
              <option value="draft" <?php echo $templateStatus === 'draft' ? 'selected' : ''; ?>>Draft</option>
              <option value="approved" <?php echo $templateStatus === 'approved' ? 'selected' : ''; ?>>Approved</option>
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
<script src="<?php echo e(asset_url('js/app.js')); ?>"></script>
<script src="<?php echo e(asset_url('js/edit.js')); ?>"></script>
<?php
render_footer();
?>
