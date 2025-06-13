# Laravel Books & Authors Management App

A simple Laravel 12 application for managing books and authors, with CRUD functionality, validation, responsive UI, and AJAX enhancements.

---

## ⚙️ Requirements

-   PHP >= 8.1
-   Composer
-   Node.js + NPM (for frontend)
-   Laravel 12
-   SQLite (used for simplicity)

---

## 🚀 Setup Instructions

```bash
# Clone repository
git clone https://github.com/ShepherdBoyy/book-app.git
cd book-app

# Install dependencies
composer install
npm install && npm run build

# Create .env
cp .env.example .env

# Set SQLite DB
touch database/database.sqlite
php artisan config:clear

# Update .env to use SQLite
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

# Generate app key
php artisan key:generate

# Run migrations and seed data
php artisan migrate --seed

# Serve the application
php artisan serve
```
