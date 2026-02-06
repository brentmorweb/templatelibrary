<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template Library · Edit Template</title>
    <style>
        :root {
            color-scheme: light;
            font-family: "Inter", "Segoe UI", system-ui, -apple-system, sans-serif;
            background: #f4f6fb;
            color: #1f2430;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .page {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 240px;
            background: #111827;
            color: #f8fafc;
            padding: 24px;
        }

        .sidebar h1 {
            font-size: 18px;
            margin: 0 0 24px;
            letter-spacing: 0.5px;
        }

        .sidebar nav a {
            display: block;
            color: inherit;
            text-decoration: none;
            padding: 10px 12px;
            border-radius: 8px;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .sidebar nav a.active {
            background: rgba(255, 255, 255, 0.12);
        }

        .content {
            flex: 1;
            padding: 32px 40px 48px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .breadcrumbs {
            font-size: 13px;
            color: #6b7280;
        }

        .breadcrumbs span {
            color: #1f2937;
            font-weight: 600;
        }

        .actions {
            display: flex;
            gap: 12px;
        }

        .btn {
            border: 1px solid transparent;
            padding: 10px 16px;
            border-radius: 10px;
            font-size: 14px;
            cursor: pointer;
            font-weight: 600;
        }

        .btn.secondary {
            background: #ffffff;
            border-color: #d0d5dd;
            color: #1f2937;
        }

        .btn.primary {
            background: #1d4ed8;
            color: #ffffff;
        }

        .header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .header h2 {
            margin: 0 0 8px;
            font-size: 26px;
        }

        .header p {
            margin: 0;
            color: #6b7280;
        }

        .grid {
            display: grid;
            grid-template-columns: minmax(0, 2.2fr) minmax(260px, 1fr);
            gap: 24px;
        }

        .card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 16px 40px rgba(15, 23, 42, 0.08);
            padding: 24px;
        }

        .card h3 {
            margin-top: 0;
            margin-bottom: 16px;
            font-size: 18px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 16px;
        }

        label {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
        }

        input,
        select,
        textarea {
            border: 1px solid #d0d5dd;
            border-radius: 10px;
            padding: 10px 12px;
            font-size: 14px;
            font-family: inherit;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .inline {
            display: grid;
            gap: 16px;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        }

        .tag-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .tag {
            background: #eef2ff;
            color: #4338ca;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
        }

        .upload {
            border: 2px dashed #cbd5f5;
            border-radius: 14px;
            padding: 20px;
            text-align: center;
            background: #f8f9ff;
        }

        .tabs {
            display: flex;
            gap: 12px;
            margin-bottom: 16px;
        }

        .tab {
            padding: 6px 12px;
            border-radius: 999px;
            background: #f3f4f6;
            font-size: 13px;
        }

        .tab.active {
            background: #1d4ed8;
            color: #ffffff;
        }

        .editor {
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            background: #0f172a;
            color: #e2e8f0;
            padding: 16px;
            font-family: "Fira Code", "JetBrains Mono", monospace;
            min-height: 180px;
        }

        .meta-list {
            display: grid;
            gap: 12px;
            font-size: 14px;
        }

        .meta-item {
            display: flex;
            justify-content: space-between;
            color: #4b5563;
        }

        .meta-item strong {
            color: #111827;
        }

        .status {
            background: #ecfdf3;
            color: #027a48;
            padding: 4px 8px;
            border-radius: 999px;
            font-size: 12px;
        }

        .helper {
            font-size: 12px;
            color: #6b7280;
            margin-top: 6px;
        }
    </style>
</head>
<body>
    <div class="page">
        <aside class="sidebar">
            <h1>Template Library</h1>
            <nav>
                <a href="#">Library</a>
                <a href="#" class="active">Create / Edit</a>
                <a href="#">Versions</a>
                <a href="#">Settings</a>
            </nav>
        </aside>

        <main class="content">
            <div class="topbar">
                <div class="breadcrumbs">Templates / <span>Homepage Hero Layout</span></div>
                <div class="actions">
                    <button class="btn secondary">Save Draft</button>
                    <button class="btn primary">Publish Template</button>
                </div>
            </div>

            <div class="header">
                <div>
                    <h2>Edit Template</h2>
                    <p>Update metadata, assets, and code snippets for this template.</p>
                </div>
                <div class="status">Draft</div>
            </div>

            <div class="grid">
                <section class="card">
                    <h3>Template Details</h3>
                    <div class="field">
                        <label for="title">Template title</label>
                        <input id="title" type="text" value="Homepage Hero Layout" />
                    </div>
                    <div class="inline">
                        <div class="field">
                            <label for="author">Author</label>
                            <select id="author">
                                <option>Jasmine Patel</option>
                                <option selected>Marco Rivera</option>
                                <option>Sam Greene</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="status">Status</label>
                            <select id="status">
                                <option selected>Draft</option>
                                <option>Approved</option>
                                <option>Deprecated</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="visibility">Visibility</label>
                            <select id="visibility">
                                <option selected>Internal</option>
                                <option>Team</option>
                                <option>Public</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label for="description">Description</label>
                        <textarea id="description">Full-width hero with headline, supporting copy, and CTA buttons. Includes layered background art and spacing tokens.</textarea>
                        <div class="helper">Keep to 1-2 sentences so it fits in search results.</div>
                    </div>
                    <div class="field">
                        <label>Tags</label>
                        <div class="tag-list">
                            <span class="tag">homepage</span>
                            <span class="tag">hero</span>
                            <span class="tag">marketing</span>
                            <span class="tag">responsive</span>
                        </div>
                        <div class="helper">Click a tag to remove, or type to add new tags.</div>
                    </div>

                    <h3>Thumbnail</h3>
                    <div class="upload">
                        <strong>Drop a new thumbnail here</strong>
                        <p class="helper">Recommended size: 800 × 600 · PNG or JPG.</p>
                        <button class="btn secondary">Browse files</button>
                    </div>

                    <h3 style="margin-top: 28px;">Template Code</h3>
                    <div class="tabs">
                        <div class="tab active">PHP / HTML</div>
                        <div class="tab">CSS</div>
                        <div class="tab">JavaScript</div>
                    </div>
                    <div class="editor">
&lt;section class="hero">
  &lt;div class="hero__content">
    &lt;h1&gt;Launch your next campaign&lt;/h1&gt;
    &lt;p&gt;Use this layout to highlight core value propositions and CTA buttons.&lt;/p&gt;
  &lt;/div&gt;
&lt;/section&gt;
                    </div>
                    <div class="helper">Use variables for theme tokens when possible.</div>
                </section>

                <aside class="card">
                    <h3>Template Metadata</h3>
                    <div class="meta-list">
                        <div class="meta-item"><span>Template ID</span><strong>TPL-0042</strong></div>
                        <div class="meta-item"><span>Created</span><strong>Mar 14, 2024</strong></div>
                        <div class="meta-item"><span>Last edited</span><strong>Jun 22, 2024</strong></div>
                        <div class="meta-item"><span>Edited by</span><strong>Marco Rivera</strong></div>
                    </div>

                    <h3 style="margin-top: 28px;">Versioning</h3>
                    <div class="field">
                        <label for="summary">Change summary</label>
                        <textarea id="summary" placeholder="Summarize what changed in this revision..."></textarea>
                    </div>
                    <button class="btn secondary" style="width: 100%;">Save to Version History</button>

                    <h3 style="margin-top: 28px;">Quick Actions</h3>
                    <div class="meta-list">
                        <button class="btn secondary">Preview Template</button>
                        <button class="btn secondary">Duplicate</button>
                        <button class="btn secondary">Archive</button>
                    </div>
                </aside>
            </div>
        </main>
    </div>
</body>
</html>
