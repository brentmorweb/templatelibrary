<?php

declare(strict_types=1);

require_once __DIR__ . '/auth/guard.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/footer.php';

render_header('MW Template Library');
?>
<div class="tl-app" data-page="library" data-api-endpoint="/app/api/templates.php">
  <header class="tl-topbar">
    <div class="tl-topbar__inner">
      <div class="tl-brand">MW Template Library</div>
      <div class="tl-topbar__actions">
        <?php if (is_authenticated()) : ?>
          <a class="tl-btn" href="template-edit.php">New Template</a>
          <a class="tl-user" href="account.php#account" aria-label="View account details">
            <div class="tl-user__avatar">AU</div>
            Admin User ▾
          </a>
        <?php else : ?>
          <a class="tl-btn" href="auth/login.php">Login</a>
        <?php endif; ?>
      </div>
    </div>
  </header>

  <main class="tl-container">
    <form class="tl-filter-bar" method="get" action="/app/api/templates.php" data-library-filters>
      <input class="tl-input" type="search" name="q" placeholder="Search templates..." data-library-search />
      <select class="tl-select" name="author" aria-label="Filter by author">
        <option value="">Author</option>
        <option>Jane Doe</option>
        <option>John Smith</option>
        <option>Admin</option>
      </select>
      <select class="tl-select" name="status" aria-label="Filter by status">
        <option value="">Status</option>
        <option value="approved">Approved</option>
        <option value="draft">Draft</option>
      </select>
      <select class="tl-select" name="sort" aria-label="Sort templates">
        <option value="recent">Sort By</option>
        <option value="recent">Most Recent</option>
        <option value="popular">Most Used</option>
      </select>
      <select class="tl-select" name="range" aria-label="Date range">
        <option value="all">Date: All Time</option>
        <option value="7">Last 7 days</option>
        <option value="30">Last 30 days</option>
      </select>
    </form>

    <div class="tl-page-header">
      <h1 class="tl-title">MW Template Library</h1>
      <p class="tl-subtitle">Browse and manage reusable templates.</p>
    </div>

    <section class="tl-template-grid" data-template-list>
      <a class="tl-template-card-link" href="template.php?id=hero-001" aria-label="View Modern Hero Section template details" data-template-id="hero-001">
        <article class="tl-template-card" data-library-card data-search="Modern Hero Section Jane Doe Updated 2 days ago">
          <div class="tl-template-thumb">Modern Hero Section</div>
          <div class="tl-template-card__body">
            <strong>Modern Hero Section</strong>
            <div class="tl-template-meta">
              <span>By Jane Doe</span>
              <span>• Updated 2 days ago</span>
            </div>
          </div>
        </article>
      </a>

      <a class="tl-template-card-link" href="template.php?id=events-014" aria-label="View Nonprofit Events List template details" data-template-id="events-014">
        <article class="tl-template-card" data-library-card data-search="Nonprofit Events List John Smith Updated 5 days ago">
          <div class="tl-template-thumb">Nonprofit Events List</div>
          <div class="tl-template-card__body">
            <strong>Nonprofit Events List</strong>
            <div class="tl-template-meta">
              <span>By John Smith</span>
              <span>• Updated 5 days ago</span>
            </div>
          </div>
        </article>
      </a>

      <a class="tl-template-card-link" href="template.php?id=gallery-208" aria-label="View Photo Gallery Grid template details" data-template-id="gallery-208">
        <article class="tl-template-card" data-library-card data-search="Photo Gallery Grid Admin Updated 1 week ago">
          <div class="tl-template-thumb">Photo Gallery Grid</div>
          <div class="tl-template-card__body">
            <strong>Photo Gallery Grid</strong>
            <div class="tl-template-meta">
              <span>By Admin</span>
              <span>• Updated 1 week ago</span>
            </div>
          </div>
        </article>
      </a>

      <a class="tl-template-card-link" href="template.php?id=newsletter-311" aria-label="View Newsletter Signup Form template details" data-template-id="newsletter-311">
        <article class="tl-template-card" data-library-card data-search="Newsletter Signup Form Alice Lee Updated 3 days ago">
          <div class="tl-template-thumb">Newsletter Signup Form</div>
          <div class="tl-template-card__body">
            <strong>Newsletter Signup Form</strong>
            <div class="tl-template-meta">
              <span>By Alice Lee</span>
              <span>• Updated 3 days ago</span>
            </div>
          </div>
        </article>
      </a>

      <a class="tl-template-card-link" href="template.php?id=team-052" aria-label="View Team Members Block template details" data-template-id="team-052">
        <article class="tl-template-card" data-library-card data-search="Team Members Block Michael B. Updated 1 day ago">
          <div class="tl-template-thumb">Team Members Block</div>
          <div class="tl-template-card__body">
            <strong>Team Members Block</strong>
            <div class="tl-template-meta">
              <span>By Michael B.</span>
              <span>• Updated 1 day ago</span>
            </div>
          </div>
        </article>
      </a>

      <a class="tl-template-card-link" href="template.php?id=cta-118" aria-label="View Call to Action Banner template details" data-template-id="cta-118">
        <article class="tl-template-card" data-library-card data-search="Call to Action Banner Sarah K. Updated 4 days ago">
          <div class="tl-template-thumb">Call to Action Banner</div>
          <div class="tl-template-card__body">
            <strong>Call to Action Banner</strong>
            <div class="tl-template-meta">
              <span>By Sarah K.</span>
              <span>• Updated 4 days ago</span>
            </div>
          </div>
        </article>
      </a>

      <a class="tl-template-card-link" href="template.php?id=faq-330" aria-label="View FAQ Accordion template details" data-template-id="faq-330">
        <article class="tl-template-card" data-library-card data-search="FAQ Accordion David W. Updated 1 week ago">
          <div class="tl-template-thumb">FAQ Accordion</div>
          <div class="tl-template-card__body">
            <strong>FAQ Accordion</strong>
            <div class="tl-template-meta">
              <span>By David W.</span>
              <span>• Updated 1 week ago</span>
            </div>
          </div>
        </article>
      </a>

      <a class="tl-template-card-link" href="template.php?id=blog-411" aria-label="View Blog Post Layout template details" data-template-id="blog-411">
        <article class="tl-template-card" data-library-card data-search="Blog Post Layout Emily T. Updated 2 weeks ago">
          <div class="tl-template-thumb">Blog Post Layout</div>
          <div class="tl-template-card__body">
            <strong>Blog Post Layout</strong>
            <div class="tl-template-meta">
              <span>By Emily T.</span>
              <span>• Updated 2 weeks ago</span>
            </div>
          </div>
        </article>
      </a>
    </section>

    <div class="tl-pagination" data-library-pagination>
      <button class="tl-page-btn" type="button">Previous</button>
      <button class="tl-page-btn is-active" type="button">1</button>
      <button class="tl-page-btn" type="button">2</button>
      <button class="tl-page-btn" type="button">3</button>
      <button class="tl-page-btn" type="button">4</button>
      <button class="tl-page-btn" type="button">Next ›</button>
    </div>
  </main>
</div>
<script src="<?php echo e(asset_url('js/app.js')); ?>"></script>
<script src="<?php echo e(asset_url('js/library.js')); ?>"></script>
<?php
render_footer();
?>
