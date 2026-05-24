# Courier Management System (SwiftShip)

PHP based **Courier Management System** for courier bookings/shipments, agents/branches, customers, and **tracking** (login required).

---

## Features
- Customer Registration & Sign In
- Courier/Shipment data store (sender/receiver, parcel weight, price, status)
- Tracking module (tracking ID search)
- Admin Dashboard + Agent Dashboard
- MySQL database integration
- Invoice/print functionality (`pdfinvoice.php`)
- PHPMailer dependency via Composer (for email related features, if used)

---

## Tech Stack
- PHP
- MySQL / MariaDB
- XAMPP (Apache + MySQL)
- Bootstrap / FontAwesome (UI)
- Composer (PHPMailer dependency)

---

## System Requirements
- XAMPP (Apache + MySQL)
- PHP 7.4+ (project generally compatible with PHP 8.x)
- Composer (recommended)

---

## Setup / Installation (XAMPP)

### 1) Place Folder
Copy this project into XAMPP `htdocs`:
- `d:/xamppp/htdocs/courier_website_final/`

### 2) Create & Import Database
1. Start **MySQL** in XAMPP.
2. Open phpMyAdmin: `http://localhost/phpmyadmin`
3. Create a new database: `courier_db`
4. Import SQL file:
   - `database/courier_db (7).sql`

> Note: The SQL dump file name includes spaces and parentheses—import exactly that file.

### 3) Install Composer Dependencies (if needed)
If PHPMailer-related errors appear:

```bash
composer install
```
Run this from the project root.

### 4) Verify Database Connection
Check `connection.php` for DB credentials:
- Host: `localhost`
- User: `root`
- Password: *(empty by default)*
- Database: `courier_db`

If your MySQL root password is different, update it in `connection.php`.

---

## How to Run
Open in browser:
- `http://localhost/courier_website_final/`

Common pages:
- Home: `index.php`
- About: `about.php`
- Track Parcel: `tracking.php`
- Sign In: `signin.php`
- Sign Up: `signup.php`
- Contact: `contact.php`

---

## Login / Session
- Tracking page typically requires login.
- Session variable used in tracking logic is commonly `C_id` (as per project code).

---

## Troubleshooting
1. **Database error / tables missing**
   - Ensure SQL import is successful and database name is `courier_db`.

2. **PHPMailer errors**
   - Run `composer install`.

3. **Login/Session issues**
   - Verify `connection.php` and PHP session configuration.

