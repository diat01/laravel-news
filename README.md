# Laravel News Project

This is a Laravel project designed to demonstrate the integration of **Filament** as an admin panel and **L5-Swagger**
for API documentation. It includes RESTful APIs, a modern admin interface, and a pre-configured database schema for
quick setup.

---

## Table of Contents

1. [Features](#features)
2. [Requirements](#requirements)
3. [Installation](#installation)
4. [Admin Panel](#admin-panel)
5. [Running the Project](#running-the-project)

---

## Features

- **Admin Panel**: Built with [Filament](https://filamentphp.com/), a modern admin panel for Laravel.
- **API Documentation**: Powered by [L5-Swagger](https://github.com/DarkaOnLine/L5-Swagger), which provides Swagger UI
  for API documentation.
- **RESTful APIs**: Fully documented and ready for integration.
- **Database Migrations**: Predefined database schema with migrations.

---

## Requirements

- PHP 8.2
- Composer
- Node.js and NPM
- Database: SQLite (default), MySQL, or PostgreSQL.

---

## Installation

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/diat01/laravel-news.git
   cd laravel-news
   ```

2. **Install Dependencies**:
   Install PHP and JavaScript dependencies using Composer and NPM:
   ```bash
   composer install
   npm install
   ```

3. **Set Up Environment Variables**:
   Copy the `.env.example` file to `.env` and update the database credentials:
   ```bash
   cp .env.example .env
   ```

4. **Generate Application Key**:
   Generate a unique application key:
   ```bash
   php artisan key:generate
   ```

5. **Environment Variables**:
   Update the `.env` file with the following configurations:

    ```env
    DB_CONNECTION=sqlite
    #DB_HOST=127.0.0.1
    #DB_PORT=3306
    #DB_DATABASE=your_database_name
    #DB_USERNAME=your_database_user
    #DB_PASSWORD=your_database_password
    ```

6. **Run Migrations and Seeders**:
   Create the tables and run the seeds by running the following command:
   ```bash
   php artisan migrate --seed
   ```

7. **Create Storage Link**:
   Create a symbolic link from public/storage to storage/app/public to make uploaded files accessible:
   ```bash
   php artisan storage:link
   ```

---

## Admin Panel

Filament provides a modern and intuitive admin panel for managing your application. To access the admin panel:

1. **Predefined Admin Users**:
   We have already created two admin users for testing purposes. You can use the following credentials to log in:
    - **Super Admin**:
        - Email: `superadmin@example.com`
        - Password: `password`

    - **Content Manager**:
        - Email: `contentmanager@example.com`
        - Password: `password`

2. **Log in to the Admin Panel**:
    - Go to `http://localhost:8000/admin`.
    - Log in using the credentials provided above.

---

## Running the Project

1. **Start the Development Server**:
   ```bash
   composer run dev
   ```

2. **Access the Application**:
    - Open your browser and go to `http://localhost:8000`.
    - Access the admin panel at `http://localhost:8000/admin`.
    - Access the API documentation at `http://localhost:8000/api/documentation`.

---
