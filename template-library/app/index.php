<?php

declare(strict_types=1);

require_once __DIR__ . '/auth/guard.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/footer.php';
require_once __DIR__ . '/includes/template-service.php';

function template_days_since(?string $date): int
{
  if ($date === null || $date === '') {
    return 0;
  }

  $timestamp = strtotime($date);
  if ($timestamp === false) {
    return 0;
  }

  return max(0, (int) floor((time() - $timestamp) / 86400));
}

function template_relative_date(?string $date): string
{
  $days = template_days_since($date);
  if ($days === 0) {
    return 'today';
  }

  if ($days === 1) {
    return '1 day ago';
  }

  if ($days < 7) {
    return sprintf('%d days ago', $days);
  }

  $weeks = (int) floor($days / 7);
  if ($weeks === 1) {
    return '1 week ago';
  }

  return sprintf('%d weeks ago', $weeks);
}

$templates = list_templates();

render_header('MW Template Library');
?>
<div class="tl-app" data-page="library" data-api-endpoint="<?php echo e(api_url('templates.php')); ?>" data-delete-endpoint="<?php echo e(api_url('template-delete.php')); ?>" data-authenticated="<?php echo is_authenticated() ? 'true' : 'false'; ?>">
  <header class="tl-site-header">
    <div class="tl-header-shell">
      <div class="tl-header-top">
        <div class="tl-topbar-title">MW Template Library</div>
        <div class="tl-topbar__actions">
          <?php if (is_authenticated()) : ?>
            <a class="tl-btn" href="template-edit.php">New Template</a>
            <a class="tl-user" href="account.php#account" aria-label="View account details">Admin User ▾</a>
          <?php else : ?>
            <a class="tl-btn" href="auth/login.php">Login</a>
          <?php endif; ?>
        </div>
      </div>

      <form class="tl-filterbar" method="get" action="<?php echo e(api_url('templates.php')); ?>" data-library-filters>
        <label class="sr-only" for="tl-q">Search templates</label>
        <div class="tl-search-wrap">
          <span class="tl-search-icon" aria-hidden="true">⌕</span>
          <input id="tl-q" type="search" name="q" placeholder="Search templates..." data-library-search>
        </div>

        <label class="sr-only" for="tl-sort">Sort templates</label>
        <select id="tl-sort" class="tl-sort-select" name="sort">
          <option value="recent">Most recent</option>
          <option value="popular">Most used</option>
          <option value="updated">Recently updated</option>
          <option value="name_asc">Name (A–Z)</option>
          <option value="name_desc">Name (Z–A)</option>
          <option value="created_desc">Newest created</option>
          <option value="created_asc">Oldest created</option>
        </select>
      </form>
    </div>
  </header>

  <main class="tl-container">
    <section class="tl-template-grid" data-template-list>
      <?php foreach ($templates as $template) : ?>
        <?php
        $templateId = (string) ($template['id'] ?? '');
        if ($templateId === '') {
          continue;
        }

        $title = trim((string) ($template['title'] ?? $template['name'] ?? 'Untitled Template'));
        $author = trim((string) ($template['author'] ?? $template['created_by'] ?? 'Unknown'));
        $updatedAt = (string) ($template['updated_at'] ?? $template['created_at'] ?? '');
        $updatedLabel = template_relative_date($updatedAt);
        $updatedDays = template_days_since($updatedAt);
        $createdDays = template_days_since((string) ($template['created_at'] ?? ''));
        $usage = (int) ($template['metadata']['usage_count'] ?? 0);
        $searchText = trim(implode(' ', [$title, $author, $template['description'] ?? '']));
        ?>
        <a class="tl-template-card-link" href="template.php?id=<?php echo urlencode($templateId); ?>" aria-label="View <?php echo e($title); ?> template details" data-template-id="<?php echo e($templateId); ?>" data-author="<?php echo e($author); ?>" data-status="<?php echo e((string) ($template['status'] ?? 'draft')); ?>" data-updated-days="<?php echo e((string) $updatedDays); ?>" data-created-days="<?php echo e((string) $createdDays); ?>" data-usage="<?php echo e((string) $usage); ?>">
          <article class="tl-template-card" data-library-card data-search="<?php echo e($searchText); ?>">
            <div class="tl-template-thumb"><?php echo e($title); ?></div>
            <div class="tl-template-card__body">
              <strong><?php echo e($title); ?></strong>
              <div class="tl-template-meta"><span>By <?php echo e($author); ?></span><span>• Updated <?php echo e($updatedLabel); ?></span></div>
            </div>
          </article>
        </a>
      <?php endforeach; ?>
    </section>

    <div class="tl-pagination" data-library-pagination data-page-size="6" aria-label="Templates pagination"></div>
  </main>
</div>
<script src="<?php echo e(asset_url('js/app.js')); ?>"></script>
<script src="<?php echo e(asset_url('js/library.js')); ?>"></script>
<?php
render_footer();
?>
