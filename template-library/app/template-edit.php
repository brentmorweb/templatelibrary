<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Template Library · Create Template</title>
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
      <div class="tl-page-header">
        <div class="tl-breadcrumbs">
          <span>‹</span>
          <a href="index.php">Create Template</a>
        </div>
        <h1 class="tl-title">Create Template</h1>
      </div>

      <div class="tl-split">
        <section class="tl-card">
          <div class="tl-card__body">
            <div class="tl-form-grid">
              <div class="tl-field">
                <label class="tl-label" for="title">Template Title</label>
                <input class="tl-input" id="title" type="text" value="Testimonial Section" />
              </div>
              <div class="tl-form-row">
                <div class="tl-field">
                  <label class="tl-label" for="description">Description</label>
                  <input class="tl-input" id="description" type="text" value="A testimonial section with customer quotes and photos." />
                </div>
                <div class="tl-field">
                  <label class="tl-label" for="tags">Tags</label>
                  <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                    <span class="tl-tag tl-tag--filled">testimonial</span>
                    <span class="tl-tag">landing page</span>
                    <span class="tl-tag">+</span>
                  </div>
                </div>
              </div>

              <div class="tl-field">
                <label class="tl-label">Upload Thumbnail</label>
                <div class="tl-upload">
                  <div class="tl-upload__icon">⬆</div>
                  <div>
                    <strong>Upload Thumbnail</strong>
                    <div class="tl-helper">Select an image to represent this template (800×500px recommended)</div>
                  </div>
                  <button class="tl-btn tl-btn--ghost" style="margin-left: auto;">Browse...</button>
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
            </div>
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
              <select class="tl-select" id="status">
                <option>Draft</option>
                <option>Approved</option>
              </select>
            </div>
            <div class="tl-info-row">
              <span>Created On:</span>
              <strong>Today</strong>
            </div>
            <div class="tl-footer-actions">
              <button class="tl-btn">Save</button>
              <button class="tl-btn tl-btn--ghost">Cancel</button>
            </div>
          </div>
        </aside>
      </div>

      <div class="tl-footer-actions">
        <button class="tl-btn tl-btn--ghost">Cancel</button>
        <button class="tl-btn">Save</button>
      </div>
    </main>
  </div>
</body>
</html>
