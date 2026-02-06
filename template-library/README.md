# MW Template Library

A lightweight PHP-based template library UI for browsing, reviewing, and managing reusable content blocks.

## Setup

### Requirements
- PHP 8.1+ (with the built-in web server or Apache)
- A web server that can serve PHP (optional for local development if you use `php -S`)

### Local development
1. From the repository root, start the PHP development server:
   ```bash
   php -S localhost:8000 -t .
   ```
2. Open the app in your browser:
   ```text
   http://localhost:8000/
   ```

### Apache configuration
- The repository includes a root `.htaccess` that blocks direct access to `/data` and can be used for clean URLs.
- Ensure `mod_rewrite` is enabled if you want to use clean URLs.

## Roles
The UI is a mockup intended to illustrate typical template library roles:
- **Admin**: Manages templates, approves or archives content, and handles permissions.
- **Author**: Creates and edits templates, submits updates, and tracks version history.
- **Reviewer**: Reviews drafts and provides feedback before templates are approved.

## Usage
- Visit the root URL to load the main library listing.
- Use search and filters to explore templates.
- Open a template card to review details, versions, and edit options.

## File layout
- `index.php`: Entry point that redirects to the default app UI.
- `app/`: Application UI mockups and related assets.
- `data/`: Storage placeholder (blocked from direct web access).
