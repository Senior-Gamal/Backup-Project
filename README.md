# Backup Manager

Backup Manager is an organizational tool built in Laravel for scheduling and managing backup configurations across multiple servers. The system targets shared hosting environments (cPanel) and does **not** execute real backups.

This project ships with precompiled assets so Node.js or npm is not required.

## Features

- Schedule internal, external, database and NAS backups
- Assign backup servers and track backup settings
- Group licenses and associate them with servers
- Role based access control (admin, manager, viewer, custom roles)
- Assign users to specific servers or clients
- Highlight conflicting backup times
- Dashboard with statistics and upcoming indicators

## Menu Structure

- **Dashboard**
- **Client Servers**
- **Backup Servers**
- **Licenses**
- **Users**
- **Roles & Permissions**
- **Server Settings**
- **System Settings**

## Setup

1. Run `composer install` to install dependencies. This copies `.env.example` to `.env` if needed.
2. If `APP_KEY` is missing, run `php artisan key:generate`.
3. Update database credentials in `.env`.
4. Run database migrations and seeders:

```bash
php artisan migrate --seed
```
If you see `Illuminate\Encryption\MissingAppKeyException`, ensure `.env` exists and contains an `APP_KEY`, then run `php artisan config:clear`.

## Development Server

After seeding, a default admin user is available:

```
Email: admin@example.com
Password: password
```

Start the local server with:

```bash
php artisan serve
```

Then visit <http://localhost:8000/login> and sign in.

The dashboard includes a dark/light mode toggle and a responsive sidebar. You can switch themes using the moon button in the top navigation bar.
