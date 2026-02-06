<?php

declare(strict_types=1);

require_once __DIR__ . '/auth/guard.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/footer.php';

render_header('MW Template Library');
?>
<div class="tl-app" data-page="library" data-api-endpoint="<?php echo e(api_url('templates.php')); ?>">
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
    <form class="tl-filter-bar" method="get" action="<?php echo e(api_url('templates.php')); ?>" data-library-filters>
      <label class="sr-only" for="tl-q">Search templates</label>
      <input
        id="tl-q"
        class="tl-input"
        type="search"
        name="q"
        placeholder="Search templates…"
        data-library-search
      >

      <label class="sr-only" for="tl-sort">Sort templates</label>
      <select
        id="tl-sort"
        class="tl-select"
        name="sort"
        onchange="this.form.submit()"
      >
        <option value="recent">Most recent</option>
        <option value="popular">Most used</option>
        <option value="updated">Recently updated</option>
        <option value="name_asc">Name (A–Z)</option>
        <option value="name_desc">Name (Z–A)</option>
        <option value="created_desc">Newest created</option>
        <option value="created_asc">Oldest created</option>
      </select>
    </form>

    <div class="tl-page-header">
      <h1 class="tl-title">MW Template Library</h1>
      <p class="tl-subtitle">Browse and manage reusable templates.</p>
    </div>

    <section class="tl-template-grid" data-template-list>
      <a class="tl-template-card-link" href="template.php?id=hero-001" aria-label="View Modern Hero Section template details" data-template-id="hero-001" data-author="Jane Doe" data-status="approved" data-updated-days="2" data-created-days="18" data-usage="120">
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

      <a class="tl-template-card-link" href="template.php?id=events-014" aria-label="View Nonprofit Events List template details" data-template-id="events-014" data-author="John Smith" data-status="draft" data-updated-days="5" data-created-days="42" data-usage="84">
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

      <a class="tl-template-card-link" href="template.php?id=gallery-208" aria-label="View Photo Gallery Grid template details" data-template-id="gallery-208" data-author="Admin" data-status="approved" data-updated-days="7" data-created-days="90" data-usage="152">
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

      <a class="tl-template-card-link" href="template.php?id=newsletter-311" aria-label="View Newsletter Signup Form template details" data-template-id="newsletter-311" data-author="Alice Lee" data-status="approved" data-updated-days="3" data-created-days="25" data-usage="176">
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

      <a class="tl-template-card-link" href="template.php?id=team-052" aria-label="View Team Members Block template details" data-template-id="team-052" data-author="Michael B." data-status="draft" data-updated-days="1" data-created-days="9" data-usage="65">
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

      <a class="tl-template-card-link" href="template.php?id=cta-118" aria-label="View Call to Action Banner template details" data-template-id="cta-118" data-author="Sarah K." data-status="approved" data-updated-days="4" data-created-days="33" data-usage="142">
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

      <a class="tl-template-card-link" href="template.php?id=faq-330" aria-label="View FAQ Accordion template details" data-template-id="faq-330" data-author="David W." data-status="draft" data-updated-days="7" data-created-days="55" data-usage="58">
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

      <a class="tl-template-card-link" href="template.php?id=blog-411" aria-label="View Blog Post Layout template details" data-template-id="blog-411" data-author="Emily T." data-status="approved" data-updated-days="14" data-created-days="120" data-usage="101">
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

    <div class="tl-pagination" data-library-pagination data-page-size="2">
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
