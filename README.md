# Backup Manager

Backup Manager is an organizational tool built in Laravel for scheduling and managing backup configurations across multiple servers. The system is intended for shared hosting environments (cPanel) and does not execute actual backup operations.

## Features

- Schedule internal, external, database, and NAS backups
- Assign backup servers and track backup settings for each server
- Group licenses and associate them with servers
- Role-based access control (admin, manager, viewer, custom roles)
- Assign users to specific servers or clients
- Highlight conflicting backup times to avoid scheduling conflicts
- Dashboard with statistics and upcoming backup indicators

## Menu Structure

- **Dashboard**
- **Client Servers**
- **Backup Servers**
- **Licenses**
- **Users**
- **Roles & Permissions**
- **Server Settings**
- **System Settings**

The Laravel project resides at the repository root.
Copy `.env.example` to `.env` and adjust database credentials as needed.

## Development Setup

1. Copy `.env.example` to `.env` and configure your MySQL credentials.
2. Run `composer install` to install PHP dependencies.
3. Run `php artisan key:generate` to set the application key.
4. Run `php artisan migrate` to create the database tables including `backup_servers`.

After these steps, visit `/backupservers` to manage backup server entries.
