# H0P3 WordPress Theme

H0P3 is a lightweight, mobile-first WordPress classic theme for a developer
portfolio. It includes a configurable homepage, a native Project content system,
standard blog templates, responsive navigation, accessibility foundations, and
RTL support without requiring a page builder or third-party plugin.

## Requirements

- WordPress 6.3 or newer
- PHP 8.1 or newer

## Main features

- Classic PHP templates with WordPress-native menus, widgets, comments, and search
- Configurable Hero, About, Skills, Projects, Contact, footer, and archive text
- Public `project` post type with a hierarchical Project Category taxonomy
- Project repository, demo, technology-stack, and status metadata
- Responsive Project archive, single Project, page, post, archive, and search views
- Accessible mobile navigation, skip link, focus styles, and reduced-motion support
- Native RTL stylesheet and translation-ready strings
- No external scripts, fonts, trackers, CSS frameworks, or page builders

## Installation and activation

1. Upload the `h0p3-theme` directory to `wp-content/themes/`, or upload the
   release ZIP through **Appearance → Themes → Add New → Upload Theme**.
2. Open **Appearance → Themes**.
3. Activate **H0P3**.
4. Open **Settings → Permalinks** and select **Save Changes** once so WordPress
   refreshes the Project archive and taxonomy rewrite rules.

## Menus

Create menus under **Appearance → Menus** and assign them to:

- **Primary Menu** for the global header
- **Footer Menu** for the global footer

The theme does not output fallback page links when a menu is unassigned.

## Custom logo

Configure the logo under **Appearance → Customize → Site Identity**. When no
logo exists, the escaped site name links to the homepage.

## Homepage configuration

WordPress automatically uses `front-page.php` for the site front page. If the
site also needs a separate blog index:

1. Create a Home page and a Blog page.
2. Open **Settings → Reading**.
3. Select **A static page**.
4. Assign Home as the homepage and Blog as the posts page.

Homepage sections render in this order:

1. Hero
2. About
3. Skills
4. Projects
5. Contact

## Customizer guide

Open **Appearance → Customize** to edit:

- **Homepage Hero** — introduction, heading, description, and two optional links
- **Homepage About** — biography details and an optional Media Library resume
- **Homepage Skills** — section introduction
- **Homepage Projects** — section introduction and archive-link text
- **Projects Archive** — archive eyebrow, heading, and description
- **Homepage Contact** — section text and email-button label
- **Social Links** — shared email, GitHub, and LinkedIn values used by the
  Contact section and footer

Optional buttons and profile links appear only when their required values exist.
Skills are defined in code and can be changed with the
`h0p3_default_skills` filter.

## Projects

### Creating a project

Open **Projects → Add New** in the WordPress administration area. Add a title,
description, excerpt, and featured image as needed, then publish the Project.

### Project categories

Manage hierarchical categories under **Projects → Categories**. Categories are
available through the REST API and appear on Project cards and single pages.

### Project metadata

The **Project Details** meta box provides:

- Repository URL
- Live demo URL
- Technology stack as comma-separated plain text
- Status: In Development, Completed, Maintained, or Archived

Example technology stack:

```text
Java, Spring Boot, PostgreSQL, Docker
```

Empty metadata is not rendered. Repository and demo URLs open in a new tab with
safe relationship attributes.

## Featured images

Use a well-compressed image with a meaningful Media Library alternative-text
value. A 16:9 source around 1600 × 900 pixels works well for cards. The theme
uses WordPress image sizes and preserves native `srcset`, `sizes`, and loading
behavior; it does not replace Media Library alt text with post titles.

## Blog setup

Assign a posts page under **Settings → Reading**. The blog index, archives, and
search results use the main WordPress query and the configured posts-per-page
value. Single posts support categories, tags, featured images, multi-page
content, adjacent-post navigation, and comments.

## RTL support

The `h0p3-style` handle marks RTL as a native replacement stylesheet. When the
active site language is right-to-left, WordPress replaces
`assets/css/main.css` with `assets/css/main-rtl.css`. The base stylesheet uses
logical properties wherever practical; the RTL replacement preserves those base
styles and applies the directional corrections needed for code, URLs, and Latin
technology tokens.

## Translations

The theme text domain is `h0p3`. The source catalog is:

```text
languages/h0p3.pot
```

Create locale-specific PO files with a translation editor and compile them to
MO files when deploying translations. Do not translate user-entered Customizer,
post, taxonomy, or metadata values.

## Accessibility

The theme includes semantic landmarks, logical heading levels, keyboard-visible
focus indicators, a focusable skip-link target, accessible navigation state,
descriptive external links, responsive forms, and reduced-motion handling.
Content authors remain responsible for meaningful link text, image alt text,
heading order inside editor content, and sufficient contrast in added content.

## Security scope

Theme settings and Project metadata use WordPress sanitization, nonce,
capability, autosave, and revision protections. Frontend output is escaped by
context while trusted editor content uses WordPress content functions.

The theme intentionally does not implement HTTP security headers, authentication
controls, firewalls, malware scanning, backups, or rate limiting. Configure
those at the hosting, server, or security-plugin layer.

## SEO scope

H0P3 supports WordPress-managed document titles, feeds, semantic templates, and
crawlable links. WordPress core provides sitemaps and canonical behavior.
Meta descriptions, social cards, advanced canonical rules, and schema should be
managed by one SEO plugin when required; the theme does not duplicate them.

## Performance notes

- Local CSS and JavaScript use file modification times for cache invalidation.
- Navigation JavaScript loads only when a Primary Menu exists and is deferred in
  the footer.
- Homepage Projects are limited to six published entries.
- Project metadata is normalized from one cached metadata read per rendered item.
- Featured images use WordPress responsive image markup and built-in image sizes.

Page caching, persistent object caching, CDN delivery, minification, WebP/AVIF
generation, and database tuning belong outside the theme.

## Optional plugin recommendations

No plugin is required for core theme functionality. Depending on the site,
optional plugin categories include:

- SEO
- Full-page caching and image optimization
- Security monitoring and backups
- Contact forms and spam protection
- Translation management

Use one well-maintained plugin per responsibility and avoid overlapping features.

## Development structure

```text
assets/                 Frontend CSS, JavaScript, images, and fonts
inc/theme-setup.php     Theme supports, assets, menus, and widgets
inc/customizer.php      Customizer defaults, settings, and controls
inc/post-types/         Project post type, taxonomy, metadata, and meta box
template-parts/         Reusable homepage, Project, and content markup
languages/              Translation template and locale files
functions.php           Theme module loader
assets/css/main-rtl.css WordPress-native RTL replacement stylesheet
theme.json              Editor and layout settings
```

## Release preparation

1. Confirm the semantic version in `style.css`.
2. Regenerate `languages/h0p3.pot`.
3. Run PHP syntax checks and JavaScript/CSS validation.
4. Test activation and frontend/admin workflows in a supported WordPress
   installation with debugging enabled.
5. Build a ZIP containing one top-level `h0p3-theme` directory with `style.css`
   directly inside it.
6. Exclude Git data, IDE settings, logs, temporary files, test artifacts,
   dependency directories, and nested ZIP files.
7. Install the ZIP on a clean WordPress site and complete the manual release
   checklist before publishing.

## License

GNU General Public License v2 or later.
