## Create Laravel Project

- Laravel installer via Composer `composer global require laravel/installer`
- Creating an Application `laravel new laravel_project`

## Commit/Push to Github

- give permission `sudo chown -R $USER:$USER /var/www/html/laravel_project`
- `git init` 
- `git add.` 
- `git commit -m "first commit"` 
- `git branch -M main` 
- `git remote add origin git@github.com:asavaliya6/laravel_project.git` 
- `git push -u origin main`

## Create Virtual Host and config

- `sudo nano /etc/apache2/sites-available/laravel_project.test.conf`
- Paste this config inside: 

```
<VirtualHost *:80>
ServerName laravel_project.test
ServerAdmin webmaster@localhost
DocumentRoot /var/www/html/laravel_project/public

<Directory /var/www/html/laravel_project/public>
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>

ErrorLog ${APACHE_LOG_DIR}/laravel_project_error.log
CustomLog ${APACHE_LOG_DIR}/laravel_project_access.log combined
</VirtualHost>
```

- Add Host Entry: `sudo nano /etc/hosts` `127.0.0.1   laravel_project.test`

## Use Breeze Auth

- `composer require laravel/breeze --dev` 
- `php artisan breeze:install`

## Use Seeder and Generate User data

- Create seeder `php artisan make:seeder UserSeeder` and modify logic
- Register Seeder in `DatabaseSeeder.php`
- Run Seeder `php artisan db:seed`

## Use Datatable to Show Listing

- Create Route => routes/web.php
- Create Controller `php artisan make:controller UserController`
- Create Blade View => resources/views/users/index.blade.php