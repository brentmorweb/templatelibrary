<?php
$pageTitle = 'Template Details';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="assets/css/app.css" />
  </head>
  <body>
    <div class="app-shell">
      <header class="app-header">
        <div class="app-header__brand">
          <span class="app-header__logo">TL</span>
          <div>
            <p class="app-header__title">Template Library</p>
            <p class="app-header__subtitle">Template Details</p>
          </div>
        </div>
        <nav class="app-header__nav">
          <a href="index.php">Library</a>
          <a href="template-edit.php">Edit Template</a>
          <a href="versions.php">Versions</a>
        </nav>
        <div class="app-header__actions">
          <button class="button button--ghost">Copy Share Link</button>
          <button class="button button--primary">Download Package</button>
        </div>
      </header>

      <main class="app-content">
        <section class="template-hero">
          <div class="template-hero__media">
            <div class="template-hero__thumbnail" aria-label="Template preview">
              <span class="template-hero__thumbnail-text">Preview</span>
            </div>
            <div class="template-hero__meta">
              <span class="badge badge--success">Approved</span>
              <span class="badge">Marketing</span>
              <span class="badge">Homepage</span>
              <span class="badge">CTA</span>
            </div>
          </div>
          <div class="template-hero__details">
            <div class="template-hero__title">
              <h1>Event Landing Page</h1>
              <p class="template-hero__description">
                A flexible landing page template with hero section, schedule blocks, and modular
                call-to-action rows.
              </p>
            </div>
            <div class="template-hero__stats">
              <div>
                <span class="template-hero__label">Author</span>
                <p class="template-hero__value">Alex Nguyen</p>
              </div>
              <div>
                <span class="template-hero__label">Created</span>
                <p class="template-hero__value">Mar 12, 2024</p>
              </div>
              <div>
                <span class="template-hero__label">Last edited</span>
                <p class="template-hero__value">Jul 18, 2024 • by Priya Shah</p>
              </div>
            </div>
            <div class="template-hero__actions">
              <button class="button">Copy PHP/HTML</button>
              <button class="button">Copy CSS</button>
              <button class="button">Copy JS</button>
            </div>
          </div>
        </section>

        <section class="template-panels">
          <div class="template-panel">
            <header class="template-panel__header">
              <h2>PHP / HTML</h2>
              <button class="button button--ghost">Copy</button>
            </header>
            <pre class="template-panel__code"><code>&lt;section class=&quot;event-hero&quot;&gt;
  &lt;div class=&quot;event-hero__content&quot;&gt;
    &lt;h1&gt;Join us for Elevate 2024&lt;/h1&gt;
    &lt;p&gt;Registration includes keynote sessions, workshops, and networking.&lt;/p&gt;
    &lt;a class=&quot;button&quot; href=&quot;/register&quot;&gt;Register now&lt;/a&gt;
  &lt;/div&gt;
&lt;/section&gt;</code></pre>
          </div>

          <div class="template-panel">
            <header class="template-panel__header">
              <h2>CSS</h2>
              <button class="button button--ghost">Copy</button>
            </header>
            <pre class="template-panel__code"><code>.event-hero {
  padding: 72px 48px;
  background: linear-gradient(120deg, #1e3a8a, #2563eb);
  color: #fff;
  border-radius: 24px;
}

.event-hero__content {
  max-width: 520px;
}</code></pre>
          </div>

          <div class="template-panel">
            <header class="template-panel__header">
              <h2>JavaScript</h2>
              <button class="button button--ghost">Copy</button>
            </header>
            <pre class="template-panel__code"><code>document.querySelector('.event-hero .button')
  .addEventListener('click', () =&gt; {
    console.log('CTA clicked');
  });</code></pre>
          </div>
        </section>

        <section class="template-activity">
          <div class="template-activity__header">
            <h2>Recent Activity</h2>
            <a href="versions.php" class="link">View version history</a>
          </div>
          <ul class="template-activity__list">
            <li>
              <span class="template-activity__event">Status changed to Approved</span>
              <span class="template-activity__meta">Jul 18, 2024 • Priya Shah</span>
            </li>
            <li>
              <span class="template-activity__event">Updated hero copy and CTA button</span>
              <span class="template-activity__meta">Jun 30, 2024 • Alex Nguyen</span>
            </li>
            <li>
              <span class="template-activity__event">Initial template created</span>
              <span class="template-activity__meta">Mar 12, 2024 • Alex Nguyen</span>
            </li>
          </ul>
        </section>
      </main>
    </div>
  </body>
</html>
