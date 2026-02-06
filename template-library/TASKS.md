# MW Template Library Task List

This checklist tracks the work needed to implement each file defined in `plan.txt`.

## Root
- [ ] `README.md`: Document setup, roles, and usage instructions.
- [ ] `.htaccess`: Deny access to `/data` and optionally support clean URLs.
- [ ] `index.php`: Entry/redirect to the app UI.

## App Pages
- [ ] `app/index.php`: Library listing + search UI (Mockup 1).
- [ ] `app/template.php`: Template details page (Mockup 2).
- [ ] `app/template-edit.php`: Create/edit template form (Mockup 3).
- [ ] `app/versions.php`: Version history view (Mockup 4).

## Authentication
- [ ] `app/auth/login.php`: Login form + credential handling.
- [ ] `app/auth/logout.php`: Session teardown and redirect.
- [ ] `app/auth/guard.php`: Access control + role checks.

## API Endpoints
- [ ] `app/api/templates.php`: List/search/filter templates.
- [ ] `app/api/template-get.php`: Fetch a single template by ID.
- [ ] `app/api/template-save.php`: Create/update templates + metadata.
- [ ] `app/api/template-download.php`: Export template assets/package.
- [ ] `app/api/template-delete.php`: Soft-delete/restore templates.
- [ ] `app/api/upload-thumbnail.php`: Upload thumbnail image.
- [ ] `app/api/auth.php`: Optional AJAX login endpoint.

## Includes
- [ ] `app/includes/config.php`: Paths + environment config.
- [ ] `app/includes/helpers.php`: Shared utilities (formatting, validation).
- [ ] `app/includes/json-store.php`: JSON storage read/write helpers.
- [ ] `app/includes/auth-service.php`: Authentication and authorization helpers.
- [ ] `app/includes/template-service.php`: Template CRUD + versioning helpers.
- [ ] `app/includes/header.php`: Shared page header markup.
- [ ] `app/includes/footer.php`: Shared page footer markup.

## Assets
- [ ] `app/assets/css/app.css`: Base UI styles for library pages.
- [ ] `app/assets/css/code-editor.css`: Optional code editor styles.
- [ ] `app/assets/js/app.js`: Shared JS for navigation + UI behaviors.
- [ ] `app/assets/js/library.js`: Listing page interactions.
- [ ] `app/assets/js/details.js`: Template detail interactions.
- [ ] `app/assets/js/edit.js`: Editor interactions (save, upload).
- [ ] `app/assets/js/versions.js`: Version history interactions.
- [ ] `app/assets/vendor/jquery.min.js`: Vendor dependency (if needed).

## Uploads
- [ ] `app/uploads/thumbnails/.gitkeep`: Keep thumbnails directory in git.

## Data Storage
- [ ] `data/templates.json`: Store template metadata and code.
- [ ] `data/users.json`: Store user accounts + roles.
- [ ] `data/versions/`: Store per-template version history JSON files.
- [ ] `data/logs/audit.json`: Store audit log of edits.

## Scripts
- [ ] `scripts/seed-admin.php`: Seed admin account and initial data.
