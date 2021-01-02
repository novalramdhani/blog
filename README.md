# Laravel 8 Blog

This repository is the laravel blog project by noval ramdhani
if you use this repository please clone or download ;)

If you have used this repository there are some initial configuration and reinstall the laravel package from composer

# Composer Install
Run composer install command to reinstall the package

```
$ composer install
```

# Environment Variables
When it's finished don't forget to create this laravel project configuration file with the file name .env please create and paste the contents of the .env.example file

# Application Key
Don't forget to create a secret key in the form of encryption for this application so it's safe, run the artisan command in your terminal

```
$ php artisan key:generate
```

# Application Database
The next step is to configure the database in the .env file, using the mysql driver to make it according to the name you want
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= // or something your like that;)
DB_USERNAME=root
DB_PASSWORD=
```

and migrate database using artisan command

```
$ php artisan migrate
```

# Seeder Command Application
I made my own command to migrate the database and I also used the seeder technique so that the data was not lost
```
$ php artisan db:refresh
```
it will refresh all your databases as well as seeders

# Run Application
Finally, to run this application, use the artisan serve command

```
$ php artisan serve
```

will open host with localhost:8000 or 127.0.0.1:8000 and paste it in your browser :)

if you are using the macOS operating system use valet and open in the browser with laravel-8-blog.test or if you replace that folder with what you want

THANK YOU HAPPY CODE 🔥
