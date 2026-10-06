# Sportiva admin UI kit

The look of the Sportiva admin panel (`/panel`), packaged to reuse in another project. It is plain **Bootstrap 5.3** plus one small CSS file — no build step.

## What's inside

| File | What it is |
|---|---|
| `admin-theme.css` | Colours, font, brand button, sidebar pills, pagination, and the responsive table (rows become cards on phones). |
| `demo.html` | A static page showing the whole look: top bar, sidebar, stat cards, filters, table, pagination, login card. Open it in a browser. |
| `razor-originals/` | The real ASP.NET Razor files I used: `_Layout`, `_Nav`, `_Auth` (login layout), `_Pager`, dashboard cards, a list page, the login page. They use `T["Key"]` (the translations dictionary) and `asp-*` tag helpers, so they only run inside an MVC project, but they are the best reference for the markup. |

## Design tokens

| Token | Value | Use |
|---|---|---|
| `--brand` | `#1b5743` | main green: buttons, links, active menu item, brand text |
| `--brand-mid` | `#2a7f62` | hover / secondary green |
| `--brand-light` | `#7ee8c7` | light accent on dark |
| `--ink` | `#0d1110` | text |
| `--muted` | `#636363` | secondary text, table cell labels on mobile |
| `--line` | `#e0e0e0` | borders |
| `--bg` | `#f6f8f7` | page background (cards are white) |

Font: **Almarai** (weights 300, 400, 700, 800), covers Arabic and Latin. Icons: **Bootstrap Icons 1.11.3**.

## Use it in a new project

1. Add to `<head>`:
   ```html
   <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet" /> <!-- bootstrap.min.css for English / LTR -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
   <link href="admin-theme.css" rel="stylesheet" />
   ```
   and `bootstrap.bundle.min.js` before `</body>` (needed for the mobile sidebar and alerts).
2. Set `<html lang="ar" dir="rtl">` (or `en` / `ltr`). Use the Bootstrap RTL build for Arabic, and the logical classes (`ms-`, `me-`, `text-end`) so one markup serves both directions.
3. Copy the page skeleton from `demo.html`: sticky top bar, `d-lg-flex panel-shell` with the `aside.panel-aside` offcanvas sidebar and `main.panel-main`.

## Patterns worth keeping

- **Page header:** `h1.h4` with a count badge, and the main action as `btn btn-brand` on the opposite side (`d-flex flex-wrap justify-content-between gap-2`).
- **Filters:** a `row g-2` of inputs over the table, a search button and a reset button.
- **Cards:** `card border-0 shadow-sm`; stat tiles use a 48px rounded icon box with `bg-<tone>-subtle text-<tone>-emphasis`.
- **Status:** `badge text-bg-success | secondary | danger | warning`.
- **Responsive table:** `table rtable`; give every `<td>` a `data-label` and the buttons cell `class="actions"`. Under 768px each row turns into a card.
- **Numbers, emails, phones:** wrap in `dir="ltr"` or `<bdi>` so they don't flip in Arabic.
- **Empty state:** centred `bi-inbox` icon with muted text.
- `.nw` stops dates wrapping.

## In Razor (ASP.NET MVC)

Copy `razor-originals/_Layout.cshtml`, `_Nav.cshtml`, `_Auth.cshtml`, `_Pager.cshtml` into `Views/Shared`. Replace `T["…"]` with your own localisation, remove the `PermissionClaims` checks in `_Nav` if you don't have permissions, and note that `@@media` is how a CSS `@media` is written inside a `.cshtml` `<style>` block (not needed if you load `admin-theme.css` as a file).
