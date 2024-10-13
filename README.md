# JMCGeoMaster
This is a Resident Management System built using Laravel and Livewire. The system allows users to manage residents, including adding, editing, and deleting residents, as well as filtering them based on their associated province and city. The project also includes features such as pagination, sorting, and search functionality.

# Installation Instructions
## Prerequisites
Ensure you have the following installed on your machine:
- PHP 8.2 or higher
- Composer (for managing PHP dependencies)
- Node.js (for managing JavaScript dependencies)
- MySQL or any compatible database
- Git (for version control)

## Installation Steps
- Create a .env file by copying the example file:
```bash
  cp .env.example .env
```

- Open the .env file in your favorite text editor and configure your database credentials. Update the following lines:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

- run the following command to migrate and run the apps
```bash
  composer install
```
```bash
  php artisan migrate
```
```bash
  php artisan serve
```
