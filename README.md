# Auth CRUD API (Laravel + Sanctum)

A robust, modern RESTful API for user authentication and profile management, built with Laravel 12 and Sanctum. This project provides secure registration, login, logout, and user profile CRUD operations, supporting both admin and regular user roles. It is designed for seamless integration with modern JavaScript frontends (React, Vue, etc.) and follows best practices for error handling, validation, and API security.

---

## Features
- User Registration & Login (Laravel Sanctum token-based authentication)
- Logout & Token Revocation
- User Profile Management (CRUD)
- Admin-only Endpoints for listing all user profiles
- Role-based Access Control
- Avatar Upload Support
- Consistent JSON API Responses
- CORS Configured for SPA/Frontend integration
- Extensible & Clean Code Structure

---

## Tech Stack
- Laravel 12 (PHP 8.2+)
- Sanctum for API authentication
- MySQL (or any Laravel-supported DB)
- Ready for integration with React, Vue, or any SPA

---

## Getting Started

### 1. Clone the Repository
```sh
git clone <your-repo-url>
cd auth-crud-api
```

### 2. Install Dependencies
```sh
composer install
```

### 3. Copy and Configure Environment File
```sh
cp .env.example .env
```
- Set your database credentials in `.env`:
  - `DB_DATABASE=your_db_name`
  - `DB_USERNAME=your_db_user`
  - `DB_PASSWORD=your_db_password`
- Set up Sanctum and CORS for SPA:
  - `SANCTUM_STATEFUL_DOMAINS=localhost:5173`
  - `SESSION_DOMAIN=localhost`
  - Adjust `APP_URL` and `FRONTEND_URL` as needed

### 4. Generate Application Key
```sh
php artisan key:generate
```

### 5. Run Migrations
```sh
php artisan migrate
```

### 6. (Optional) Seed the Database
```sh
php artisan db:seed
```

### 7. Set Storage Link (for avatar uploads)
```sh
php artisan storage:link
```

### 8. Serve the Application
```sh
php artisan serve
```

---

## API Endpoints

| Method | Endpoint             | Description                        | Auth Required | Role      |
|--------|----------------------|------------------------------------|---------------|-----------|
| POST   | /api/register        | Register a new user                | No            | Any       |
| POST   | /api/login           | Login and receive a token          | No            | Any       |
| POST   | /api/logout          | Logout (revoke token)              | Yes           | Any       |
| GET    | /api/profile         | List all profiles (admin only)     | Yes           | Admin     |
| GET    | /api/profile/{id}    | Get a user profile                 | Yes           | Any       |
| PUT    | /api/profile/{id}    | Update a user profile              | Yes           | Any/Admin |
| DELETE | /api/profile/{id}    | Delete a user profile              | Yes           | Any/Admin |

---

## Authentication
- Uses Laravel Sanctum for API token authentication.
- For SPA (React, Vue, etc.), ensure you use `withCredentials: true` in your frontend requests.
- For mobile or external clients, use the `Authorization: Bearer <token>` header.

---

## Error Handling & Response Format
- All API responses are in JSON.
- Success:
  ```json
  {
    "success": true,
    "data": { ... }
  }
  ```
- Error:
  ```json
  {
    "success": false,
    "message": "Error message.",
    "errors": { ... }
  }
  ```

---

## File Uploads
- Avatar images are stored in `storage/app/public/avatars`.
- Use `multipart/form-data` for requests with files.

---

## CORS & SPA Integration
- CORS is configured for `http://localhost:5173` (Vite/React default).
- Update `config/cors.php` and `.env` if your frontend runs on a different port or domain.

---

## Seeded Test Accounts

After running the database seeder, you can use these credentials to log in:

**Regular User**
- Email: user@example.com
- Password: password123

**Admin User**
- Email: admin@example.com
- Password: adminpass123

---

