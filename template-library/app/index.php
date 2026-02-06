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
        <select class="tl-select" data-library-filter="author">
          <option data-filter-value="all">Author</option>
          <option>Jane Doe</option>
          <option>John Smith</option>
          <option>Admin</option>
          <option>Alice Lee</option>
          <option>Michael B.</option>
          <option>Sarah K.</option>
          <option>David W.</option>
          <option>Emily T.</option>
        </select>
        <select class="tl-select" data-library-filter="status">
          <option data-filter-value="all">Status</option>
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
        <article class="tl-template-card" data-library-card data-author="Jane Doe" data-status="Approved" data-search="Modern Hero Section Jane Doe Approved">
          <div class="tl-template-thumb">Modern Hero Section</div>
          <div class="tl-template-card__body">
            <strong>Modern Hero Section</strong>
            <div class="tl-template-meta">
              <span>By Jane Doe</span>
              <span>• Updated 2 days ago</span>
            </div>
          </div>
        </article>

        <article class="tl-template-card" data-library-card data-author="John Smith" data-status="Approved" data-search="Nonprofit Events List John Smith Approved">
          <div class="tl-template-thumb">Nonprofit Events List</div>
          <div class="tl-template-card__body">
            <strong>Nonprofit Events List</strong>
            <div class="tl-template-meta">
              <span>By John Smith</span>
              <span>• Updated 5 days ago</span>
            </div>
          </div>
        </article>

        <article class="tl-template-card" data-library-card data-author="Admin" data-status="Draft" data-search="Photo Gallery Grid Admin Draft">
          <div class="tl-template-thumb">Photo Gallery Grid</div>
          <div class="tl-template-card__body">
            <strong>Photo Gallery Grid</strong>
            <div class="tl-template-meta">
              <span>By Admin</span>
              <span>• Updated 1 week ago</span>
            </div>
          </div>
        </article>

        <article class="tl-template-card" data-library-card data-author="Alice Lee" data-status="Approved" data-search="Newsletter Signup Form Alice Lee Approved">
          <div class="tl-template-thumb">Newsletter Signup Form</div>
          <div class="tl-template-card__body">
            <strong>Newsletter Signup Form</strong>
            <div class="tl-template-meta">
              <span>By Alice Lee</span>
              <span>• Updated 3 days ago</span>
            </div>
          </div>
        </article>

        <article class="tl-template-card" data-library-card data-author="Michael B." data-status="Draft" data-search="Team Members Block Michael B. Draft">
          <div class="tl-template-thumb">Team Members Block</div>
          <div class="tl-template-card__body">
            <strong>Team Members Block</strong>
            <div class="tl-template-meta">
              <span>By Michael B.</span>
              <span>• Updated 1 day ago</span>
            </div>
          </div>
        </article>

        <article class="tl-template-card" data-library-card data-author="Sarah K." data-status="Approved" data-search="Call to Action Banner Sarah K. Approved">
          <div class="tl-template-thumb">Call to Action Banner</div>
          <div class="tl-template-card__body">
            <strong>Call to Action Banner</strong>
            <div class="tl-template-meta">
              <span>By Sarah K.</span>
              <span>• Updated 4 days ago</span>
            </div>
          </div>
        </article>

        <article class="tl-template-card" data-library-card data-author="David W." data-status="Draft" data-search="FAQ Accordion David W. Draft">
          <div class="tl-template-thumb">FAQ Accordion</div>
          <div class="tl-template-card__body">
            <strong>FAQ Accordion</strong>
            <div class="tl-template-meta">
              <span>By David W.</span>
              <span>• Updated 1 week ago</span>
            </div>
          </div>
        </article>

        <article class="tl-template-card" data-library-card data-author="Emily T." data-status="Approved" data-search="Blog Post Layout Emily T. Approved">
          <div class="tl-template-thumb">Blog Post Layout</div>
          <div class="tl-template-card__body">
            <strong>Blog Post Layout</strong>
            <div class="tl-template-meta">
              <span>By Emily T.</span>
              <span>• Updated 2 weeks ago</span>
            </div>
          </div>
        </article>
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
