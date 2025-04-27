# CI4 Login Authentication and Product Management Project

This project is a web application built with the CodeIgniter 4 framework that provides user authentication features along with product management capabilities. It includes user registration, login, logout, a protected dashboard, and CRUD operations for products.

## Features

- User registration with validation and password hashing
- User login with session management
- User logout
- Dashboard accessible only to authenticated users
- Product management (Create, Read, Update, Delete)
- User and product data stored securely in a MySQL database

## Installation

1. Clone the repository or download the project files.

2. Install dependencies using Composer:

```bash
composer install
```

3. Copy the `.env` file from the example and configure it:

```bash
cp env .env
```

Edit the `.env` file to set your base URL and database connection settings:

```
app.baseURL = 'http://localhost:8080/'
database.default.hostname = localhost
database.default.database = your_database_name
database.default.username = your_db_username
database.default.password = your_db_password
database.default.DBDriver = MySQLi
```

4. Run the database migrations to create the necessary tables:

```bash
php spark migrate
```

5. (Optional) Seed the database with sample products:

```bash
php spark db:seed ProductsSeeder
```

6. Set your web server document root to the `public` directory of the project.

7. Start the development server (optional):

```bash
php spark serve
```

## Usage

- Access the login page at: `/auth/login`
- Access the registration page at: `/auth/register`
- After login, you will be redirected to the dashboard at: `/dashboard`
- Use the logout link to end the session.
- Manage products via the dashboard with options to create, edit, view, and delete products.

## Database

The project uses the following tables:

### users

- `id` (primary key)
- `name`
- `email` (unique)
- `password` (hashed)
- `created_at`
- `updated_at`

### products

- `id` (primary key)
- `name`
- `description`
- `price`
- `created_at`
- `updated_at`

## Requirements

- PHP 8.1 or higher
- PHP extensions:
  - intl
  - mbstring
  - json (enabled by default)
  - mysqlnd (if using MySQL)
  - libcurl (if using HTTP\CURLRequest library)

## License

This project is open source and available under the MIT License.

---

For more information about CodeIgniter 4, visit the [official website](https://codeigniter.com) and the [user guide](https://codeigniter.com/user_guide/).
