# Laravel CRUD App — Internship Week 1

A Laravel web application built during the first week of internship at Rakso CT. The project covers core Laravel MVC fundamentals and culminates in a fully functional Employee Leave Request System.

---

## Tech Stack

- **Framework**: Laravel 13
- **Language**: PHP 8.5
- **Database**: SQLite
- **Version Control**: Git / GitHub

---

## Modules

| Module | URL | Description |
|---|---|---|
| Students | `/students` | Basic CRUD — first MVC exercise |
| Departments | `/departments` | CRUD with search and pagination |
| Employees | `/employees` | CRUD with department relationship |
| Department HR | `/department-hr` | HR officers assigned per department |
| Leave Types | `/leave-types` | Configurable leave categories |
| Leave Requests | `/leave-requests` | Leave filing and HR approval workflow |

---

## Setup Instructions

### 1. Clone the repository
```bash
git clone https://github.com/vulnanx/laravel-crud-app.git
cd laravel-crud-app
```

### 2. Install dependencies
```bash
composer install
```

### 3. Set up environment
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Run migrations and seed sample data
```bash
php artisan migrate --seed
```

### 5. Start the development server
```bash
php artisan serve
```

Visit `http://127.0.0.1:8000` in your browser.

---

## Database Structure

Based on the ERD designed on Day 4:

- `departments` — company departments
- `employees` — employees linked to a department
- `department_hr` — HR officers assigned per department
- `leave_types` — types of leave (Sick, Vacation, Emergency, etc.)
- `leave_requests` — leave requests filed by employees, reviewed by HR

---

## Features

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
