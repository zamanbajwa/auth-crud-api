# API Documentation

## Base URL

```
http://localhost:8000/api
```

---

## Authentication

- **Token-based** (Laravel Sanctum)
- For SPA: Use `withCredentials: true`
- For mobile/external: Use `Authorization: Bearer <token>`

---

## Endpoints

### 1. Register

**POST** `/register`

Registers a new user.

#### Request Body (multipart/form-data or JSON)
| Field      | Type   | Required | Description         |
|------------|--------|----------|---------------------|
| name       | string | Yes      | User's name         |
| email      | string | Yes      | User's email        |
| password   | string | Yes      | User's password     |
| password_confirmation | string | Yes | Must match password |
| phone      | string | No       | User's phone        |
| avatar     | file   | No       | User's avatar image |

#### Example Request (JSON)
```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123",
  "password_confirmation": "password123",
  "phone": "1234567890"
}
```

#### Success Response
```json
{
  "user": { ...user fields... },
  "token": "sanctum_token_here"
}
```

---

### 2. Login

**POST** `/login`

Logs in a user and returns a token.

#### Request Body (JSON)
| Field    | Type   | Required | Description     |
|----------|--------|----------|-----------------|
| email    | string | Yes      | User's email    |
| password | string | Yes      | User's password |

#### Example Request
```json
{
  "email": "user@example.com",
  "password": "password123"
}
```

#### Success Response
```json
{
  "user": { ...user fields... },
  "token": "sanctum_token_here"
}
```

---

### 3. Logout

**POST** `/logout`  
**Auth Required:** Yes

Logs out the current user (revokes token).

#### Headers
```
Authorization: Bearer <token>
```

#### Success Response
```json
{
  "message": "Logged out successfully"
}
```

---

### 4. List All Profiles (Admin Only)

**GET** `/profile`  
**Auth Required:** Yes (Admin only)

#### Success Response
```json
[
  { ...user1 fields... },
  { ...user2 fields... }
]
```

---

### 5. Get User Profile

**GET** `/profile/{id}`  
**Auth Required:** Yes

#### Success Response
```json
{
  "id": 1,
  "name": "John Doe",
  "email": "john@example.com",
  "phone": "1234567890",
  "avatar": "avatars/filename.jpg",
  ...
}
```

---

### 6. Update User Profile

**PUT** `/profile/{id}`  
**Auth Required:** Yes

#### Request Body (multipart/form-data or JSON)
| Field   | Type   | Required | Description         |
|---------|--------|----------|---------------------|
| name    | string | No       | User's name         |
| phone   | string | No       | User's phone        |
| bio     | string | No       | User's bio          |
| avatar  | file   | No       | User's avatar image |

#### Success Response
```json
{
  "id": 1,
  "name": "Updated Name",
  ...
}
```

---

### 7. Delete User Profile

**DELETE** `/profile/{id}`  
**Auth Required:** Yes

#### Success Response
```json
{
  "message": "User deleted"
}
```

---

## Error Response Format

```json
{
  "success": false,
  "message": "Error message.",
  "errors": { ... }
}
```

---

## Seeded Test Accounts

- **Regular User:**  
  Email: user@example.com  
  Password: password123

- **Admin User:**  
  Email: admin@example.com  
  Password: adminpass123

---

## Notes

- All endpoints return JSON.
- For protected routes, include the token in the `Authorization` header or use cookies for SPA.
- For file uploads, use `multipart/form-data`.
