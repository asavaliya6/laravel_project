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

## Use Yajra Plugin and Php Carbon to Display Userdata

- Install Yajra `composer require yajra/laravel-datatables-oracle:"^12.0"` and configure `php artisan vendor:publish --tag=datatables`
- Create Route => routes/web.php
- Add Class in Controller => UserController
- Create Blade View => resources/views/users/list.blade.php, resources/views/users/edit.blade.php

## Send Email 

- Create app and password https://support.google.com/mail/answer/185833?hl=en
- Create Mailable class `php artisan make:mail TestMail`
- Create Controller `php artisan make:controller EmailController`
- Blade View => resources/views/emails/send-email.blade.php
- Add route 

## Send Email on delete

- Create Mailable class `php artisan make:mail UserDeletedMail --markdown=emails.user-deleted`
- Create Observable class `php artisan make:observer UserObserver --model=User`
- Register observer class in => AppServiceProvider

## Send Email on delete using queue

- Create Job Class `php artisan make:job SendUserDeletedMailJob`
- Update => Observers/UserObserver.php
- Create Migration table using queue `php artisan make:queue-table` and migrate table `php artisan migrate`
- run queue  `php artisan queue:work`

## Getter / Setter method 

- Create Controller => ProductController, Model => Product and Migration => Products
- Create View => Product/list, Product/success

