<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
# Laravel CRUD App — Internship Week 1
<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
A Laravel web application built during the first week of internship at Rakso CT. The project covers core Laravel MVC fundamentals and culminates in a fully functional Employee Leave Request System.
## About Laravel
---
Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:
## Tech Stack
- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).
- **Framework**: Laravel 13
- **Language**: PHP 8.5
- **Database**: SQLite
- **Version Control**: Git / GitHub
Laravel is accessible, powerful, and provides tools required for large, robust applications.
---
## Learning Laravel
## Modules
Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.
| Module | URL | Description |
|---|---|---|
| Students | `/students` | Basic CRUD — first MVC exercise |
| Departments | `/departments` | CRUD with search and pagination |
| Employees | `/employees` | CRUD with department relationship |
| Department HR | `/department-hr` | HR officers assigned per department |
| Leave Types | `/leave-types` | Configurable leave categories |
| Leave Requests | `/leave-requests` | Leave filing and HR approval workflow |
In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.
---
You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.
## Setup Instructions
## Agentic Development
### 1. Clone the repository
```bash
git clone https://github.com/vulnanx/laravel-crud-app.git
cd laravel-crud-app
```
Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:
### 2. Install dependencies
```bash
composer install
```
### 3. Set up environment
```bash
composer require laravel/boost --dev
cp .env.example .env
php artisan key:generate
```
php artisan boost:install
### 4. Run migrations and seed sample data
```bash
php artisan migrate --seed
```
Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.
### 5. Start the development server
```bash
php artisan serve
```
## Contributing
Visit `http://127.0.0.1:8000` in your browser.
Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).
---
## Code of Conduct
## Database Structure
In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).
Based on the ERD designed on Day 4:
## Security Vulnerabilities
- `departments` — company departments
- `employees` — employees linked to a department
- `department_hr` — HR officers assigned per department
- `leave_types` — types of leave (Sick, Vacation, Emergency, etc.)
- `leave_requests` — leave requests filed by employees, reviewed by HR
If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.
---
## License
## Features
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
- Full CRUD on all modules
- Form validation with error display
- Search and pagination
- Leave request approval/rejection workflow with timestamp
- Sample data via database seeder
---
## Branch Structure
| Branch | Description |
|---|---|
| `main` | Production-ready merged code |
| `feature/student-module` | Day 3 — Student MVC module |
| `feature/department-module` | Day 5 — Department CRUD module |
| `feature/leave-system` | Full Employee Leave Request System |
