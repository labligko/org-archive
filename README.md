# Organization Archive

> Digital archive and organizational profile system for documenting an organization's structure, members, programs, achievements, and activities across management periods.

## 📌 Project Status

**Development Status:** 🚧 In Development  
**Current Checkpoint:** Checkpoint 1 — Foundation & Home Page

The database structure, Eloquent relationships, seed data, and initial Home page have been implemented.

---

## ✨ Current Features

### Organization Structure
- Management period
- Cabinet
- Organizational units
- Parent-child organizational structure
- Positions
- Members

### Organizational Activities
- Programs
- Achievements
- Activity documentation
- Multiple images per documentation/activity

### Current Home Page
- Current cabinet information
- Cabinet tagline
- Organization structure overview
- About section
- Basic navigation
- Responsive layout foundation

---

## 🛠️ Tech Stack

- **Framework:** Laravel
- **Language:** PHP
- **Database:** MySQL
- **Frontend:** Blade + Tailwind CSS
- **Build Tool:** Vite
- **Environment:** Laragon
- **Version Control:** Git

---

## 🗂️ Project Structure

```text
org-archive/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   └── Models/
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── layouts/
│       └── home.blade.php
├── routes/
│   └── web.php
├── public/
├── storage/
└── README.md
```

---

## 🧩 Database Structure

```text
Period
  └── Cabinet
       └── Organizational Unit
            ├── Position
            │    └── Member
            ├── Program
            │    └── Member
            ├── Achievement
            │    └── Member
            └── Documentation
                 └── Documentation Image
```

### Main Tables

| Table | Purpose |
|---|---|
| `periods` | Management period |
| `cabinets` | Cabinet information |
| `organizational_units` | BPH, divisions, departments |
| `positions` | Positions within organizational units |
| `members` | Organization members |
| `programs` | Organizational programs |
| `achievements` | Achievements |
| `documentations` | Activity documentation |
| `documentation_images` | Images belonging to a documentation |
| `member_program` | Member ↔ Program relationship |
| `achievement_member` | Achievement ↔ Member relationship |

### Documentation Images

A single documentation/activity can contain multiple images.

```text
Documentation
    ├── Image 1
    ├── Image 2
    ├── Image 3
    └── ...
```

This is implemented through the `documentation_images` table.

---

## 🚀 Installation

### 1. Clone the repository

```bash
git clone <repository-url>
cd org-archive
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Install frontend dependencies

```bash
npm install
```

### 4. Configure environment

Copy the environment file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Configure the database connection in `.env`.

Example:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=org_archive
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Run migrations and seed data

```bash
php artisan migrate:fresh --seed
```

### 6. Create storage link

```bash
php artisan storage:link
```

### 7. Start Vite

```bash
npm run dev
```

### 8. Start Laravel server

```bash
php artisan serve
```

The application will be available at:

```text
http://127.0.0.1:8000
```

---

## 🌱 Development Seed Data

The project currently includes development seed data through:

```text
database/seeders/OrganizationSeeder.php
```

The current seed contains example organizational data including:

- 1 management period
- 1 cabinet
- 3 organizational units
- 7 members
- 2 programs
- Documentation with multiple images

The seed data exists primarily for development and UI testing.

---

## 🔗 Eloquent Relationships

```text
Period
 └── hasOne Cabinet

Cabinet
 ├── belongsTo Period
 └── hasMany OrganizationalUnit

OrganizationalUnit
 ├── belongsTo Cabinet
 ├── belongsTo Parent OrganizationalUnit
 ├── hasMany Children
 ├── hasMany Positions
 ├── hasMany Programs
 ├── hasMany Achievements
 └── hasMany Documentations

Position
 ├── belongsTo OrganizationalUnit
 └── hasMany Members

Member
 ├── belongsTo Position
 ├── belongsToMany Programs
 └── belongsToMany Achievements

Program
 ├── belongsTo OrganizationalUnit
 └── belongsToMany Members

Achievement
 ├── belongsTo OrganizationalUnit
 └── belongsToMany Members

Documentation
 ├── belongsTo OrganizationalUnit
 └── hasMany DocumentationImages

DocumentationImage
 └── belongsTo Documentation
```

---

## 🖥️ Current UI

The first development checkpoint contains a basic dark-themed Home page with:

- Navigation bar
- Cabinet hero section
- Organization structure section
- About section
- Basic footer

The page currently uses real database data rather than hardcoded organizational content.

---

## 🛣️ Roadmap

### Phase 1 — Foundation
- [x] Laravel project setup
- [x] Database design
- [x] Migrations
- [x] Eloquent models
- [x] Model relationships
- [x] Seeder
- [x] Development data
- [x] Home controller
- [x] Home page
- [x] Basic Tailwind styling

### Phase 2 — Organization
- [ ] Organization overview
- [ ] Organizational unit detail
- [ ] Position listing
- [ ] Member listing
- [ ] Member detail

### Phase 3 — Programs & Achievements
- [ ] Program listing
- [ ] Program detail
- [ ] Achievement listing
- [ ] Achievement detail
- [ ] Member ↔ program display
- [ ] Member ↔ achievement display

### Phase 4 — Documentation
- [ ] Documentation listing
- [ ] Documentation detail
- [ ] Image gallery
- [ ] Multiple image display
- [ ] Activity timeline

### Phase 5 — Administration
- [ ] Authentication
- [ ] Admin dashboard
- [ ] CRUD organization data
- [ ] CRUD members
- [ ] CRUD programs
- [ ] CRUD achievements
- [ ] CRUD documentation
- [ ] Image management

### Phase 6 — Production
- [ ] Validation
- [ ] Authorization
- [ ] Error handling
- [ ] Image optimization
- [ ] SEO
- [ ] Production configuration
- [ ] Deployment

---

## 📍 Development Checkpoint

### Checkpoint 1 — Foundation & Home Page

**Status:** ✅ Completed

At this checkpoint:

- Database successfully migrated
- Database successfully seeded
- Eloquent relationships verified
- Documentation → multiple images relationship verified
- HomeController implemented
- Blade layout implemented
- Home page implemented
- Tailwind styling working
- Initial Git backup ready

---

## 👤 Development

Developed as an organizational archive system project.

---

## 📄 License

This project is currently intended for organizational/internal use.

==========================================================================

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
