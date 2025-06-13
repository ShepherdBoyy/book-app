# 📚 Laravel Books & Authors Management App

A simple Laravel 12 application that manages a list of books and their authors. This app supports full CRUD functionality, input validation, search filtering, responsive UI, AJAX-powered interactions, and sample seeded data.

---

## ⚙️ Requirements

Make sure the following tools are installed:

-   PHP >= 8.1
-   Composer
-   Laravel 12
-   Node.js + NPM
-   SQLite

---

## 🚀 Setup Instructions

Follow these steps to run the project locally:

```bash
# 1. Clone the repository
git clone https://github.com/ShepherdBoyy/book-app.git
cd book-app

# 2. Install PHP dependencies
composer install

# 3. Install frontend dependencies and compile assets
npm install && npm run build

# 4. Create environment config
cp .env.example .env

# 5. Create SQLite database file
touch database/database.sqlite

# 6. Update the .env file
# Inside .env, set the following:
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

# 7. Clear config cache
php artisan config:clear

# 8. Generate application key
php artisan key:generate

# 9. Run migrations and seeders
php artisan migrate --seed

# 10. Serve the application
php artisan serve
```
