<?php
$pageTitle = 'Template Details';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $pageTitle; ?></title>
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
            <a href="index.php">Template Library</a>
          </div>
          <h1 class="tl-title">Modern Hero Section</h1>
          <div class="tl-detail-meta">
            <span>By <a href="#">Jane Doe</a></span>
            <span>• Created on April 10, 2024</span>
            <span>• Last edited 2 days ago by Jane Doe</span>
          </div>
          <div style="margin-top: 12px; display: flex; gap: 8px; flex-wrap: wrap;">
            <span class="tl-tag">hero</span>
            <span class="tl-tag">landing page</span>
          </div>
        </div>

        <div class="tl-split">
          <section>
            <div class="tl-card">
              <div class="tl-card__body">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                  <div style="display: flex; align-items: center; gap: 10px;">
                    <span class="tl-section-title" style="margin: 0;">Template Text</span>
                    <span class="tl-pill">Detail</span>
                  </div>
                  <button class="tl-btn tl-btn--light">🔒 Copy Code</button>
                </div>

                <div style="display: grid; grid-template-columns: minmax(160px, 220px) minmax(0, 1fr); gap: 16px;">
                  <div class="tl-card" style="box-shadow: var(--tl-shadow-sm);">
                    <div class="tl-template-thumb" style="height: 120px;">Preview</div>
                  </div>
                  <div>
                    <div class="tl-tabbar">
                      <div class="tl-tab is-active">PHP/HTML</div>
                      <div class="tl-tab">CSS</div>
                      <div class="tl-tab">JavaScript</div>
                    </div>
                    <pre class="tl-code-panel"><code>&lt;?php if ($hero_title) { ?&gt;
  &lt;h1&gt;&lt;?php echo $hero_title; ?&gt;&lt;/h1&gt;
&lt;?php } ?&gt;

&lt;div class="hero-section"&gt;
  &lt;p&gt;&lt;?php echo $hero_description; ?&gt;&lt;/p&gt;
  &lt;a class="btn btn-primary" href="#"&gt;Learn More&lt;/a&gt;
&lt;/div&gt;</code></pre>
                  </div>
                </div>

                <div style="display: flex; gap: 12px; margin-top: 16px;">
                  <button class="tl-btn tl-btn--ghost">⬇ Download as Zip</button>
                  <button class="tl-btn tl-btn--danger">🗑 Delete Template</button>
                </div>
              </div>
            </div>
          </section>

          <aside class="tl-card" style="align-self: start;">
            <div class="tl-card__body tl-side-card">
              <div style="display: flex; align-items: center; gap: 12px;">
                <div class="tl-user__avatar">JD</div>
                <div>
                  <div class="tl-muted" style="font-size: 0.8rem;">Author</div>
                  <strong>Jane Doe</strong>
                </div>
              </div>
              <div class="tl-divider"></div>
              <div class="tl-info-row">
                <span>Status</span>
                <span class="tl-pill" style="background: #e8f8ee; color: #15803d; border-color: #bbf7d0;">Approved</span>
              </div>
              <div class="tl-info-row">
                <span>Created On</span>
                <strong>April 10, 2024</strong>
              </div>
              <div class="tl-info-row">
                <span>Last Edited</span>
                <strong>2 days ago by Jane Doe</strong>
              </div>
              <button class="tl-btn" style="width: 100%;">⬇ Download All Files</button>
              <button class="tl-btn tl-btn--ghost" style="width: 100%;">✎ Edit Template</button>
              <button class="tl-btn tl-btn--ghost" style="width: 100%;">⏱ View Version History</button>
              <button class="tl-btn tl-btn--ghost" style="width: 100%; color: #dc2626; border-color: #fecaca;">🗑 Delete Template</button>
            </div>
          </aside>
        </div>
      </main>
    </div>
  </body>
</html>
