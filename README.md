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

## Development Server

The project is located in this repository's root directory (not in the `backup-manager` folder). To start the local server run:

```bash
php artisan serve
```

Visit <http://localhost:8000/backupservers> to access the interface.


