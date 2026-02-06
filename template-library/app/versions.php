<?php
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Template Versions</title>
  <style>
    :root {
      color-scheme: light;
      font-family: "Inter", "Segoe UI", system-ui, -apple-system, sans-serif;
      background-color: #f5f6fb;
      color: #1a1b1f;
    }
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      padding: 32px;
      background: #f5f6fb;
    }
    .page {
      max-width: 1100px;
      margin: 0 auto;
      display: grid;
      gap: 24px;
    }
    .card {
      background: #ffffff;
      border-radius: 16px;
      padding: 24px;
      box-shadow: 0 18px 40px rgba(31, 40, 75, 0.08);
    }
    .breadcrumb {
      font-size: 14px;
      color: #6b7280;
    }
    .breadcrumb span {
      margin: 0 6px;
      color: #9aa2b1;
    }
    .header {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
    }
    .header h1 {
      margin: 0;
      font-size: 26px;
    }
    .meta {
      display: flex;
      flex-wrap: wrap;
      gap: 16px;
      font-size: 14px;
      color: #4b5563;
    }
    .meta strong {
      color: #111827;
    }
    .actions {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }
    .button {
      border: 0;
      border-radius: 10px;
      padding: 10px 16px;
      font-weight: 600;
      cursor: pointer;
    }
    .button.secondary {
      background: #eef2ff;
      color: #3b5bcc;
    }
    .button.primary {
      background: #1f4aff;
      color: #fff;
    }
    .summary {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 16px;
    }
    .summary-card {
      padding: 16px;
      border-radius: 12px;
      background: #f7f8ff;
    }
    .summary-card h3 {
      margin: 0 0 6px;
      font-size: 14px;
      color: #6b7280;
      text-transform: uppercase;
      letter-spacing: 0.04em;
    }
    .summary-card p {
      margin: 0;
      font-size: 18px;
      font-weight: 600;
    }
    .version-grid {
      display: grid;
      grid-template-columns: 1.2fr 0.8fr;
      gap: 20px;
    }
    .version-list {
      display: grid;
      gap: 12px;
    }
    .version-item {
      display: grid;
      grid-template-columns: 32px 1fr auto;
      gap: 12px;
      align-items: center;
      padding: 14px;
      border-radius: 12px;
      border: 1px solid #edf0f6;
      background: #fff;
    }
    .version-dot {
      width: 12px;
      height: 12px;
      border-radius: 999px;
      background: #1f4aff;
      margin: 0 auto;
    }
    .version-meta h4 {
      margin: 0 0 4px;
      font-size: 16px;
    }
    .version-meta p {
      margin: 0;
      font-size: 13px;
      color: #6b7280;
    }
    .version-actions {
      display: grid;
      gap: 8px;
      justify-items: end;
    }
    .tag {
      display: inline-flex;
      align-items: center;
      padding: 4px 10px;
      border-radius: 999px;
      background: #e6f4ff;
      color: #0b5cab;
      font-size: 12px;
      font-weight: 600;
    }
    .compare {
      display: grid;
      gap: 16px;
    }
    .compare .panel {
      border-radius: 12px;
      background: #f9fafc;
      padding: 16px;
      border: 1px solid #edf0f6;
    }
    .panel h3 {
      margin: 0 0 12px;
      font-size: 15px;
    }
    .diff-list {
      list-style: none;
      padding: 0;
      margin: 0;
      display: grid;
      gap: 10px;
      font-size: 13px;
    }
    .diff-list li {
      display: flex;
      justify-content: space-between;
      color: #4b5563;
    }
    .diff-list span {
      font-weight: 600;
      color: #111827;
    }
    .footnote {
      font-size: 12px;
      color: #9aa2b1;
    }
    @media (max-width: 900px) {
      .version-grid {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>
  <main class="page">
    <section class="card">
      <div class="breadcrumb">
        Library <span>/</span> Email Templates <span>/</span> Promo Banner
      </div>
      <div class="header">
        <div>
          <h1>Version History</h1>
          <div class="meta">
            <div><strong>Template:</strong> Promo Banner</div>
            <div><strong>Owner:</strong> Morgan Lee</div>
            <div><strong>Status:</strong> Approved</div>
          </div>
        </div>
        <div class="actions">
          <button class="button secondary" type="button">Export Version</button>
          <button class="button primary" type="button">Restore Selected</button>
        </div>
      </div>
    </section>

    <section class="summary">
      <div class="summary-card">
        <h3>Latest Version</h3>
        <p>v2.4.1 (Sep 18, 2024)</p>
      </div>
      <div class="summary-card">
        <h3>Total Versions</h3>
        <p>18 revisions</p>
      </div>
      <div class="summary-card">
        <h3>Last Edited By</h3>
        <p>Kayla Nguyen</p>
      </div>
      <div class="summary-card">
        <h3>Pending Approval</h3>
        <p>v2.4.2 Draft</p>
      </div>
    </section>

    <section class="card version-grid">
      <div class="version-list">
        <div class="version-item">
          <div class="version-dot"></div>
          <div class="version-meta">
            <h4>v2.4.2 Draft</h4>
            <p>Edited by Kayla Nguyen · Sep 21, 2024 at 9:12 AM</p>
          </div>
          <div class="version-actions">
            <span class="tag">Draft</span>
            <button class="button secondary" type="button">Preview</button>
          </div>
        </div>
        <div class="version-item">
          <div class="version-dot" style="background:#34d399"></div>
          <div class="version-meta">
            <h4>v2.4.1 Approved</h4>
            <p>Edited by Morgan Lee · Sep 18, 2024 at 4:40 PM</p>
          </div>
          <div class="version-actions">
            <span class="tag" style="background:#ecfdf3;color:#047857">Approved</span>
            <button class="button secondary" type="button">Preview</button>
          </div>
        </div>
        <div class="version-item">
          <div class="version-dot" style="background:#f97316"></div>
          <div class="version-meta">
            <h4>v2.3.0 Deprecated</h4>
            <p>Edited by Ayesha Khan · Aug 30, 2024 at 1:05 PM</p>
          </div>
          <div class="version-actions">
            <span class="tag" style="background:#fff7ed;color:#c2410c">Deprecated</span>
            <button class="button secondary" type="button">Preview</button>
          </div>
        </div>
        <div class="version-item">
          <div class="version-dot" style="background:#9ca3af"></div>
          <div class="version-meta">
            <h4>v2.2.4</h4>
            <p>Edited by Sofia Patel · Aug 12, 2024 at 11:32 AM</p>
          </div>
          <div class="version-actions">
            <span class="tag" style="background:#f3f4f6;color:#4b5563">Archived</span>
            <button class="button secondary" type="button">Preview</button>
          </div>
        </div>
      </div>

      <div class="compare">
        <div class="panel">
          <h3>Compare versions</h3>
          <div class="meta" style="margin-bottom:12px">
            <div><strong>From:</strong> v2.3.0</div>
            <div><strong>To:</strong> v2.4.1</div>
          </div>
          <ul class="diff-list">
            <li>HTML blocks changed <span>+3 / -1</span></li>
            <li>CSS tokens updated <span>12 edits</span></li>
            <li>JS behavior changes <span>2</span></li>
            <li>Assets replaced <span>1 image</span></li>
          </ul>
        </div>
        <div class="panel">
          <h3>Restore notes</h3>
          <p style="margin:0 0 10px;font-size:13px;color:#4b5563;">
            Restoring a version will create a new draft. You can review the code
            before publishing back to Approved status.
          </p>
          <div class="meta">
            <div><strong>Audit log:</strong> 5 actions recorded</div>
            <div><strong>Last restore:</strong> v2.1.0 on Jul 18</div>
          </div>
        </div>
      </div>
    </section>

    <div class="footnote">
      Tip: Use the version selector to compare HTML, CSS, and JS side by side.
    </div>
  </main>
</body>
</html>
