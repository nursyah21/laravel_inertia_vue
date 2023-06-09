# Documentation

Tutorial based on <https://www.youtube.com/watch?v=cFE4znLLhsg>

the tutorial on youtube used laravel version 8.0, but this source code used laravel 10, so there's have littlebit different.

i created this, for learning purpose at least in here we learn:

1. basic laravel with vue
2. basic crud (create, read, update, delete)
3. basic styling with tailwindcss

what you can improve in this code:

1. add modal confirmation when delete items
2. add preview image when upload file image
3. add filter when upload file so only receive image format
4. fix when send email password link

## preview

![ss1](/assets/ss1.png)

![ss2](/assets/ss2.png)


## structure folder

in this tutorial you need edit the following:

- views: resources/js/Pages
- routes: routes/web.php
- database: database/migrations
- controller: app/Http/Controllers
- model: app/Models
- env: .env

## step

for complete step please see video on youtube

- install laravel: <https://laravel.com/docs/10.x#your-first-laravel-project>

```bash
composer global require laravel/installer
 
laravel new inertial-vue-file-upload

cd example-app
php artisan serve
```

- install breeze <https://laravel.com/docs/10.x/starter-kits#breeze-and-inertia>

  - install breze with vue and add dark mode

  - before you run migrate you need edit .env file and edit DB configuration based database you have created for this project and if you didn't have .env you can copy .env.example

```bash
composer require laravel/breeze --dev

php artisan breeze:install vue --dark
 
php artisan migrate
npm install
npm run dev
```

- create model and controller

  - create model with migration

```bash
php artisan make:model Topic -m
```

- edit new generate file in database/migrations

```bash
php artisan migrate
```

- create controller

```bash
php artisan make:controller TopicController
```

## other

- getting theme for tailwindcss in merakui

<https://merakiui.com/components/tables>

- linked folder storage to public

```bash
php artisan storage:link
```

- php and mysql

<https://www.apachefriends.org/download.html>

- composer

<https://getcomposer.org/download/>

- node and npm

<https://nodejs.org/en/download/>


if after install you can't run program you need to add path program

<https://unix.stackexchange.com/questions/26047/how-to-correctly-add-a-path-to-path>
