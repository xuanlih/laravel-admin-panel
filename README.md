Project setup instructions
- may refer to install and configure laravel (https://laravel.com/docs/11.x)
- its using herd as well for phpmyadmin

1) Clone the repository:

git clone https://github.com/your-repo-name.git
cd your-repo-name

2-Install Laravel dependencies:

composer install

3-Set up environment file:

cp .env.example .env
php artisan key:generate

4-Configure database in .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password

5-Run migrations and seeders:

php artisan migrate

6-Serve the app:

php artisan serve

7-Tools Used:

- Laravel 11.x
- Herd (local dev environment)
- PHPMyAdmin (for DB access)

API endpoints documentation

| Endpoint             | Method | Description                      |
| -------------------- | ------ | -------------------------------- |
| `/`                  | GET    | Landing page                     |
| `/layout/login`      | GET    | Login form                       |
| `/layout/login`      | POST   | Handle login                     |
| `/layout/register`   | GET    | Register admin form (with roles) |
| `/layout/register`   | POST   | Handle admin registration        |
| `/layout/admin`      | GET    | List of admins                   |
| `/layout/role`       | GET    | List of roles                    |
| `/layout/addRole`    | GET    | Add role form                    |
| `/layout/addRole`    | POST   | Handle role creation             |
| `/admin/{id}/edit`   | GET    | Edit admin                       |
| `/admin/{id}/update` | POST   | Update admin                     |
| `/logout`            | POST   | Logout current session           |


Assumptions and design choices
- Admins can only register with active roles.
- Role active status is stored as 0 (inactive) or 1 (active).
- roles and admins tables are related using role_id.
- Simple Bootstrap styling is used for UI consistency.
- The pagination uses Laravel's built-in pagination features.
- User filtering is basic and based on name.
