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
  <style>
    :root {
      color-scheme: light;
      --bg: #f5f7fb;
      --panel: #ffffff;
      --border: #e2e8f0;
      --muted: #64748b;
      --text: #0f172a;
      --primary: #2563eb;
      --primary-dark: #1d4ed8;
      --accent: #10b981;
      --warning: #f59e0b;
      --danger: #ef4444;
      --shadow: 0 15px 30px rgba(15, 23, 42, 0.08);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: "Inter", system-ui, -apple-system, sans-serif;
      background: var(--bg);
      color: var(--text);
      line-height: 1.5;
    }

    .app-shell {
      display: grid;
      grid-template-columns: 280px 1fr;
      min-height: 100vh;
    }

    .sidebar {
      padding: 32px 24px;
      background: var(--panel);
      border-right: 1px solid var(--border);
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 12px;
      font-weight: 700;
      font-size: 1.1rem;
      margin-bottom: 32px;
    }

    .brand-badge {
      width: 36px;
      height: 36px;
      border-radius: 12px;
      background: linear-gradient(135deg, #60a5fa, #22d3ee);
      display: grid;
      place-items: center;
      color: #fff;
      font-weight: 700;
    }

    .filter-group {
      margin-bottom: 28px;
    }

    .filter-group h3 {
      font-size: 0.9rem;
      margin-bottom: 12px;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      color: var(--muted);
    }

    .filter-card {
      border: 1px solid var(--border);
      border-radius: 16px;
      padding: 16px;
      background: #f8fafc;
    }

    .filter-card label {
      font-size: 0.85rem;
      color: var(--muted);
      display: block;
      margin-top: 12px;
      margin-bottom: 6px;
    }

    .filter-card input,
    .filter-card select {
      width: 100%;
      padding: 10px 12px;
      border-radius: 10px;
      border: 1px solid var(--border);
      background: #fff;
      font-size: 0.9rem;
    }

    .filter-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-top: 12px;
    }

    .tag-chip {
      padding: 6px 10px;
      border-radius: 999px;
      background: #e2e8f0;
      font-size: 0.75rem;
      font-weight: 600;
      color: #334155;
    }

    .tag-chip.active {
      background: #dbeafe;
      color: var(--primary-dark);
    }

    .sidebar-footer {
      margin-top: auto;
      display: grid;
      gap: 12px;
    }

    .sidebar-footer .hint {
      font-size: 0.8rem;
      color: var(--muted);
    }

    .sidebar-footer button {
      width: 100%;
      border: none;
      border-radius: 12px;
      padding: 12px 14px;
      font-weight: 600;
      color: #fff;
      background: var(--primary);
      cursor: pointer;
    }

    .main {
      padding: 32px 40px 48px;
    }

    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 24px;
      margin-bottom: 28px;
    }

    .topbar h1 {
      font-size: 1.8rem;
      margin-bottom: 4px;
    }

    .topbar p {
      color: var(--muted);
      font-size: 0.95rem;
    }

    .user-card {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 10px 14px;
      border-radius: 999px;
      border: 1px solid var(--border);
      background: var(--panel);
      font-size: 0.85rem;
    }

    .user-avatar {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: #e2e8f0;
      display: grid;
      place-items: center;
      font-weight: 600;
      color: var(--muted);
    }

    .toolbar {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      align-items: center;
      margin-bottom: 28px;
    }

    .search-input {
      flex: 1 1 320px;
      padding: 14px 16px;
      border-radius: 14px;
      border: 1px solid var(--border);
      background: var(--panel);
      font-size: 0.95rem;
    }

    .toolbar button {
      border: none;
      border-radius: 12px;
      padding: 12px 18px;
      font-weight: 600;
      cursor: pointer;
    }

    .btn-primary {
      background: var(--primary);
      color: #fff;
    }

    .btn-secondary {
      background: #e2e8f0;
      color: #1e293b;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 16px;
      margin-bottom: 28px;
    }

    .stat-card {
      padding: 18px 20px;
      border-radius: 16px;
      background: var(--panel);
      border: 1px solid var(--border);
      box-shadow: var(--shadow);
    }

    .stat-card h4 {
      font-size: 0.85rem;
      color: var(--muted);
      margin-bottom: 8px;
      text-transform: uppercase;
      letter-spacing: 0.08em;
    }

    .stat-card p {
      font-size: 1.4rem;
      font-weight: 700;
    }

    .library-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 20px;
    }

    .template-card {
      background: var(--panel);
      border-radius: 18px;
      border: 1px solid var(--border);
      overflow: hidden;
      box-shadow: var(--shadow);
      display: grid;
    }

    .template-thumb {
      height: 150px;
      background: linear-gradient(135deg, #e2e8f0, #c7d2fe);
      display: grid;
      place-items: center;
      color: #475569;
      font-weight: 600;
    }

    .template-body {
      padding: 18px;
      display: grid;
      gap: 12px;
    }

    .template-body h3 {
      font-size: 1rem;
    }

    .template-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      color: var(--muted);
      font-size: 0.8rem;
    }

    .status-pill {
      padding: 4px 10px;
      border-radius: 999px;
      font-weight: 600;
      font-size: 0.75rem;
      color: #fff;
    }

    .status-pill.draft {
      background: var(--warning);
    }

    .status-pill.approved {
      background: var(--accent);
    }

    .status-pill.deprecated {
      background: var(--danger);
    }

    .template-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 6px;
    }

    .template-tags span {
      padding: 4px 8px;
      border-radius: 8px;
      background: #f1f5f9;
      font-size: 0.75rem;
      color: #475569;
    }

    .card-actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 8px;
    }

    .card-actions button {
      border: none;
      background: none;
      color: var(--primary-dark);
      font-weight: 600;
      cursor: pointer;
    }

    .meta-pill {
      padding: 4px 10px;
      border-radius: 999px;
      background: #f8fafc;
      border: 1px solid var(--border);
      font-size: 0.75rem;
    }

    @media (max-width: 960px) {
      .app-shell {
        grid-template-columns: 1fr;
      }

      .sidebar {
        border-right: none;
        border-bottom: 1px solid var(--border);
      }
    }
  </style>
</head>
<body>
  <div class="app-shell">
    <aside class="sidebar">
      <div class="brand">
        <div class="brand-badge">TL</div>
        Template Library
      </div>

      <div class="filter-group">
        <h3>Smart Filters</h3>
        <div class="filter-card">
          <label for="keyword">Keyword search</label>
          <input id="keyword" type="search" placeholder="Search title, tags..." />

          <label for="status">Status</label>
          <select id="status">
            <option>All statuses</option>
            <option>Approved</option>
            <option>Draft</option>
            <option>Deprecated</option>
          </select>

          <label for="author">Author</label>
          <select id="author">
            <option>All authors</option>
            <option>Alyssa Brown</option>
            <option>Jordan Lee</option>
            <option>Casey Diaz</option>
          </select>

          <label for="updated">Last updated</label>
          <select id="updated">
            <option>Any time</option>
            <option>Last 7 days</option>
            <option>Last 30 days</option>
            <option>Last 90 days</option>
          </select>

          <div class="filter-tags">
            <span class="tag-chip active">Landing</span>
            <span class="tag-chip">Navigation</span>
            <span class="tag-chip">Forms</span>
            <span class="tag-chip">Ecommerce</span>
            <span class="tag-chip">Events</span>
          </div>
        </div>
      </div>

      <div class="filter-group">
        <h3>Quick Actions</h3>
        <div class="filter-card">
          <label for="sort">Sort by</label>
          <select id="sort">
            <option>Last edited</option>
            <option>Created date</option>
            <option>Title (A-Z)</option>
          </select>

          <label for="view">View mode</label>
          <select id="view">
            <option>Card grid</option>
            <option>Compact list</option>
            <option>Kanban</option>
          </select>
        </div>
      </div>

      <div class="sidebar-footer">
        <button type="button">Create new template</button>
        <p class="hint">48 active templates · 6 awaiting review</p>
      </div>
    </aside>

    <main class="main">
      <div class="topbar">
        <div>
          <h1>Library Overview</h1>
          <p>Browse, search, and manage reusable Morweb templates.</p>
        </div>
        <div class="user-card">
          <div class="user-avatar">AB</div>
          Alyssa Brown · Admin
        </div>
      </div>

      <div class="toolbar">
        <input class="search-input" type="search" placeholder="Search templates by title, tag, or description" />
        <button class="btn-secondary" type="button">Filters</button>
        <button class="btn-primary" type="button">New template</button>
      </div>

      <section class="stats-grid">
        <div class="stat-card">
          <h4>Total templates</h4>
          <p>84</p>
        </div>
        <div class="stat-card">
          <h4>Approved</h4>
          <p>62</p>
        </div>
        <div class="stat-card">
          <h4>Drafts</h4>
          <p>14</p>
        </div>
        <div class="stat-card">
          <h4>Needs review</h4>
          <p>8</p>
        </div>
      </section>

      <section class="library-grid">
        <article class="template-card">
          <div class="template-thumb">Event Landing Page</div>
          <div class="template-body">
            <div>
              <h3>Community Event Hero</h3>
              <div class="template-meta">
                <span class="status-pill approved">Approved</span>
                <span>Updated 2 days ago</span>
              </div>
            </div>
            <p class="template-meta">Owner: Jordan Lee · 3 variants · 18 uses</p>
            <div class="template-tags">
              <span>Landing</span>
              <span>Events</span>
              <span>Hero</span>
            </div>
            <div class="card-actions">
              <button type="button">Open details</button>
              <span class="meta-pill">Last edit: J. Lee</span>
            </div>
          </div>
        </article>

        <article class="template-card">
          <div class="template-thumb">Admissions Portal</div>
          <div class="template-body">
            <div>
              <h3>Admissions Checklist</h3>
              <div class="template-meta">
                <span class="status-pill draft">Draft</span>
                <span>Updated 5 hours ago</span>
              </div>
            </div>
            <p class="template-meta">Owner: Casey Diaz · 2 variants · 6 uses</p>
            <div class="template-tags">
              <span>Forms</span>
              <span>Checklist</span>
              <span>Onboarding</span>
            </div>
            <div class="card-actions">
              <button type="button">Open details</button>
              <span class="meta-pill">Needs review</span>
            </div>
          </div>
        </article>

        <article class="template-card">
          <div class="template-thumb">Donor Campaign</div>
          <div class="template-body">
            <div>
              <h3>Giving Tuesday Grid</h3>
              <div class="template-meta">
                <span class="status-pill approved">Approved</span>
                <span>Updated 1 week ago</span>
              </div>
            </div>
            <p class="template-meta">Owner: Alyssa Brown · 4 variants · 24 uses</p>
            <div class="template-tags">
              <span>Campaign</span>
              <span>Ecommerce</span>
              <span>Cards</span>
            </div>
            <div class="card-actions">
              <button type="button">Open details</button>
              <span class="meta-pill">Last edit: A. Brown</span>
            </div>
          </div>
        </article>

        <article class="template-card">
          <div class="template-thumb">Student Stories</div>
          <div class="template-body">
            <div>
              <h3>Testimonial Carousel</h3>
              <div class="template-meta">
                <span class="status-pill deprecated">Deprecated</span>
                <span>Updated 3 weeks ago</span>
              </div>
            </div>
            <p class="template-meta">Owner: Jordan Lee · 1 variant · 9 uses</p>
            <div class="template-tags">
              <span>Carousel</span>
              <span>Stories</span>
              <span>Media</span>
            </div>
            <div class="card-actions">
              <button type="button">Open details</button>
              <span class="meta-pill">Replaced</span>
            </div>
          </div>
        </article>

        <article class="template-card">
          <div class="template-thumb">Program Finder</div>
          <div class="template-body">
            <div>
              <h3>Program Filter Hub</h3>
              <div class="template-meta">
                <span class="status-pill approved">Approved</span>
                <span>Updated 12 days ago</span>
              </div>
            </div>
            <p class="template-meta">Owner: Casey Diaz · 5 variants · 16 uses</p>
            <div class="template-tags">
              <span>Navigation</span>
              <span>Filters</span>
              <span>Search</span>
            </div>
            <div class="card-actions">
              <button type="button">Open details</button>
              <span class="meta-pill">Last edit: C. Diaz</span>
            </div>
          </div>
        </article>

        <article class="template-card">
          <div class="template-thumb">Faculty Profile</div>
          <div class="template-body">
            <div>
              <h3>Faculty Spotlight</h3>
              <div class="template-meta">
                <span class="status-pill draft">Draft</span>
                <span>Updated yesterday</span>
              </div>
            </div>
            <p class="template-meta">Owner: Alyssa Brown · 2 variants · 7 uses</p>
            <div class="template-tags">
              <span>Profiles</span>
              <span>Directory</span>
              <span>Cards</span>
            </div>
            <div class="card-actions">
              <button type="button">Open details</button>
              <span class="meta-pill">Awaiting QA</span>
            </div>
          </div>
        </article>
      </section>
    </main>
  </div>
</body>
</html>
