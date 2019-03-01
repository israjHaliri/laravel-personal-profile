## Needed stacks
    + xampp php 5.*
    + laravel
    + composer
    + mysql

## Follow this checklist for running
	+ copy project to apache web server under /htdocs
	+ give permission sudo schmod -R 777 /laravel-personal-profile
	+ create .env file under project from .env-example
	+ configure database in /config/database.php
	+ create database like in database.php
    + run composer install inside the project
    + run php artisan migrate
    + run php artisan db:seed
    + run php artisan key:generate
    + access app at localhost/name_project & use data form seeder
    
![alt text](https://github.com/israjHaliri/laravel-personal-profile/blob/master/ss1.png)
![alt text](https://github.com/israjHaliri/laravel-personal-profile/blob/master/ss2.png)
