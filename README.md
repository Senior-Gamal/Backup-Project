# Backup Manager

Backup Manager is an organizational tool built in Laravel for scheduling and managing backup configurations across multiple servers. The system targets shared hosting environments (cPanel) and does **not** execute real backups.

This project ships with precompiled assets so Node.js or npm is not required.


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

php artisan migrate --seed
If you see `Illuminate\Encryption\MissingAppKeyException`, ensure `.env` exists and contains an `APP_KEY`, then run `php artisan config:clear`.
## Development Server

Start the local server with:
```bash
php artisan serve
```
Then visit <http://localhost:8000/backupservers>.
php artisan db:seed
```

You can then log in at `/login` using:

- **Email:** `admin@example.com`
- **Password:** `password`

Once logged in, access the dashboard at `/dashboard`.

## Dataset Analysis Helper

The repository includes a small script `analyze_dataset.py` for inspecting
datasets similar to TinyStories. It looks for a JSONL file at
`data/tiny_stories.jsonl` and prints some basic statistics about text length
distribution. If the optional `datasets` Python package is installed, the script
can also download the `djik/TinyStories-12k` dataset automatically.

## Updating the Project

To update your local copy from the command line run:

```bash
git pull
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
```

Then start the server with `php artisan serve`.
