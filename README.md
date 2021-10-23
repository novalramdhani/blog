# Laravel 8 Blog

This repository is the laravel blog project by noval ramdhani
if you use this repository please clone or download

If you have used this repository there are some initial configuration and reinstall the laravel package from composer

## What are the features in this project
Here are the features in this project

1. User Authentication System
  
  - Register 
  - Login

2. Posts System CRUD (Create, Read, Update & Delete with upload image and comment)
 - Create Post
 - Search Post
 - Update Post
 - Delete Post
 - Upload Image for post
 - Post Comment

3. User Settings System
- View Profile
- Update Profile
- Change Password User

4. User Authorization (With small role admin & user)

5. All pages
- Home Page
- Posts page
- About Page

## What technology is used in this project?
Only a little, the technology that I use for this blog application.

1. Tech for backend 
 - PHP 8.0.12
 - Mysql 8+
 - Laravel 8.67.0

2. Tech for frontend
 - Select2.js
 - Bootstrap 4
 - Font Awesome 5.10.0

3. For asset bundling 
 - Laravel Mix

### help from other composer packages

- laravelista/comments
- sebastianbergmann/phpunit
- laravel/ui

# Contribute this project application
I'm very happy if you want to help in this blog application project that I made, starting with adding projects or finding bugs.

First, please clone this repository.
```bash
git clone https://github.com/novalramdhani/laravel-blog.git
cd laravel-blog
cp .env.example .env
```

Second, install or update all vendor dependencies using composer package manager
```bash
composer install && composer update
```

Third, use the command **php artisan key:generate** for APP_KEY in the .env file.
```bash
php artisan key:generate
```

Fourth, then configure the database using mysql in the .env file.
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=root
DB_PASSWORD=
```
by default, the mysql database password does not use a password, but if your mysql uses a password please enter the password in the .env configuration file.

Finally, use the php artisan serve command to run local PHP development.
```bash
php artisan serve
```
If you are using the macOS operating system, use Laravel Valet.

Happy coding.
