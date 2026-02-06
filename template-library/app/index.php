<?php
// Mockup 1: Library listing + search UI
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Template Library</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/app.css" />
</head>
<body>
  <div class="tl-app">
    <header class="tl-topbar">
      <div class="tl-topbar__inner">
        <div class="tl-brand">Template Library</div>
        <div class="tl-topbar__actions">
          <button class="tl-btn">New Template</button>
          <div class="tl-user">
            <div class="tl-user__avatar">AU</div>
            Admin User ▾
          </div>
        </div>
      </div>
    </header>

    <main class="tl-container">
      <section class="tl-filter-bar">
        <input class="tl-input" type="search" placeholder="Search templates..." data-library-search />
        <select class="tl-select">
          <option>Author</option>
          <option>Jane Doe</option>
          <option>John Smith</option>
          <option>Admin</option>
        </select>
        <select class="tl-select">
          <option>Status</option>
          <option>Approved</option>
          <option>Draft</option>
        </select>
        <select class="tl-select">
          <option>Sort By</option>
          <option>Most Recent</option>
          <option>Most Used</option>
        </select>
        <select class="tl-select">
          <option>Date: All Time</option>
          <option>Last 7 days</option>
          <option>Last 30 days</option>
        </select>
      </section>

      <div class="tl-page-header">
        <h1 class="tl-title">Template Library</h1>
        <p class="tl-subtitle">Browse and manage reusable templates.</p>
      </div>

      <section class="tl-template-grid">
        <a class="tl-template-card-link" href="template.php" aria-label="View Modern Hero Section template details">
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

        <a class="tl-template-card-link" href="template.php" aria-label="View Nonprofit Events List template details">
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

        <a class="tl-template-card-link" href="template.php" aria-label="View Photo Gallery Grid template details">
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

        <a class="tl-template-card-link" href="template.php" aria-label="View Newsletter Signup Form template details">
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

        <a class="tl-template-card-link" href="template.php" aria-label="View Team Members Block template details">
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

        <a class="tl-template-card-link" href="template.php" aria-label="View Call to Action Banner template details">
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

        <a class="tl-template-card-link" href="template.php" aria-label="View FAQ Accordion template details">
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

        <a class="tl-template-card-link" href="template.php" aria-label="View Blog Post Layout template details">
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

      <div class="tl-pagination">
        <button class="tl-page-btn">Previous</button>
        <button class="tl-page-btn is-active">1</button>
        <button class="tl-page-btn">2</button>
        <button class="tl-page-btn">3</button>
        <button class="tl-page-btn">4</button>
        <button class="tl-page-btn">Next ›</button>
      </div>
    </main>
  </div>
  <script src="assets/js/library.js"></script>
</body>
</html>
