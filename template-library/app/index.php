<?php
declare(strict_types=1);

require_once __DIR__ . '/auth/guard.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/footer.php';
require_once __DIR__ . '/includes/template-service.php';

function template_days_since(?string $date): int
{
  if (!$date) return 0;
  $timestamp = strtotime($date);
  if ($timestamp === false) return 0;
  return max(0, (int) floor((time() - $timestamp) / 86400));
}

function template_relative_date(?string $date): string
{
  $days = template_days_since($date);
  if ($days === 0) return 'today';
  if ($days === 1) return '1 day ago';
  if ($days < 7) return "$days days ago";
  $weeks = (int) floor($days / 7);
  return $weeks === 1 ? '1 week ago' : "$weeks weeks ago";
}

$templates = list_templates();

render_header('MW Template Library');
?>

<div class="tl-app">
  <header class="tl-site-header">
    <div class="tl-header-shell">
      <div class="tl-header-top">
        <div class="tl-topbar-title">MW Template Library</div>
        <div class="tl-topbar__actions">
          <?php if (is_authenticated()) : ?>
            <a class="tl-btn" href="template-edit.php">New Template</a>
            <a class="tl-user" href="account.php#account">Admin User ▾</a>
          <?php else : ?>
            <a class="tl-btn" href="auth/login.php">Login</a>
          <?php endif; ?>
        </div>
      </div>

      <div class="tl-filterbar">
        <div class="tl-search-wrap">
          <span class="tl-search-icon">⌕</span>
          <input id="tl-q" type="search" placeholder="Search templates..." data-library-search>
        </div>

        <select id="tl-sort" class="tl-sort-select" data-library-sort>
          <option value="name_asc">Name (A–Z)</option>
          <option value="name_desc">Name (Z–A)</option>
          <option value="recent">Most recent</option>
          <option value="created_desc">Newest created</option>
          <option value="created_asc">Oldest created</option>
        </select>
      </div>
    </div>
  </header>

  <main class="tl-container">
    <section class="tl-template-grid" data-template-list>

      <?php foreach ($templates as $template) :
        $templateId = (string) ($template['id'] ?? '');
        if ($templateId === '') continue;

        $title = trim((string) ($template['title'] ?? $template['name'] ?? 'Untitled Template'));
        $author = trim((string) ($template['author'] ?? $template['created_by'] ?? 'Unknown'));
        $updatedAt = (string) ($template['updated_at'] ?? $template['created_at'] ?? '');
        $updatedDays = template_days_since($updatedAt);
        $createdDays = template_days_since((string) ($template['created_at'] ?? ''));
        $usage = (int) ($template['metadata']['usage_count'] ?? 0);
        $searchText = strtolower(trim(implode(' ', [$title, $author, $template['description'] ?? ''])));
        $thumbnailUrl = trim((string) ($template['thumbnail_url'] ?? ''));
      ?>

        <a class="tl-template-card-link"
           href="template.php?id=<?php echo urlencode($templateId); ?>"
           data-search="<?php echo e($searchText); ?>"
           data-title="<?php echo e(strtolower($title)); ?>"
           data-updated="<?php echo e((string)$updatedDays); ?>"
           data-created="<?php echo e((string)$createdDays); ?>"
           data-usage="<?php echo e((string)$usage); ?>">

          <article class="tl-template-card">
            <div class="tl-template-thumb">
              <?php if ($thumbnailUrl !== '') : ?>
                <img src="<?php echo e($thumbnailUrl); ?>" alt="<?php echo e($title); ?>" loading="lazy">
              <?php else : ?>
                <?php echo e($title); ?>
              <?php endif; ?>
            </div>
            <div class="tl-template-card__body">
              <strong><?php echo e($title); ?></strong>
              <div class="tl-template-meta">
                <span>By <?php echo e($author); ?></span>
                <span>• Updated <?php echo e(template_relative_date($updatedAt)); ?></span>
              </div>
            </div>
          </article>

        </a>

      <?php endforeach; ?>

    </section>
  </main>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

  const searchInput = document.querySelector('[data-library-search]');
  const sortSelect = document.querySelector('[data-library-sort]');
  const grid = document.querySelector('[data-template-list]');

  const cards = Array.from(grid.querySelectorAll('.tl-template-card-link'));

  function applyFilters() {
    const query = searchInput.value.trim().toLowerCase();

    cards.forEach(card => {
      const text = card.dataset.search || '';
      card.style.display = text.includes(query) ? '' : 'none';
    });
  }

  function applySort() {
    const sort = sortSelect.value;

    const sorted = cards.slice().sort((a, b) => {
      switch (sort) {
        case 'name_desc':
          return b.dataset.title.localeCompare(a.dataset.title);

        case 'recent':
          return Number(a.dataset.updated) - Number(b.dataset.updated);

        case 'created_desc':
          return Number(a.dataset.created) - Number(b.dataset.created);

        case 'created_asc':
          return Number(b.dataset.created) - Number(a.dataset.created);

        default:
          return a.dataset.title.localeCompare(b.dataset.title);
      }
    });

    sorted.forEach(card => grid.appendChild(card));
  }

  searchInput.addEventListener('input', applyFilters);
  sortSelect.addEventListener('change', applySort);

});
</script>

<?php render_footer(); ?>
