# Backup Manager

Backup Manager is a Laravel 10.x application used to register servers and plan their backup schedules. It does **not** execute any backups – it only stores information about where and when backups should occur.

## Installation (cPanel)

1. Upload the repository files to your cPanel account.
2. Ensure PHP 8.1+ and Composer are available.
3. From the project directory run `composer install`.
4. Copy `.env.example` to `.env` and adjust the database credentials.
5. Run `php artisan key:generate` followed by `php artisan migrate`.
6. Seed the database with an admin user using `php artisan db:seed`.

## Future Ideas

- API endpoints to update server information remotely.
- Cron automation to push schedules to external backup scripts.
- Integration with monitoring tools for license expiration alerts.
