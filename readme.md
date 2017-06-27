# Zeus Pvt CRM

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Installation
Larevel needs PHP >= 5.5.9, OpenSSL PHP Extension, PDO PHP Extension, mysql, Mbstring PHP Extension, Tokenizer PHP Extension.
In linux PHP can be installed by issueing
sudo apt-get install php5 libapache2-mod-php5

Mysql can be install by

sudo apt-get install mysql-server
sudo apt-get install pdo-mysql

Need to install both

Install composer
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer


Create a new directory and enter below command to install Laravel

composer create-project laravel/laravel –-prefer-dist

## make configurations
Edit the .env file in zeus directory with the mysql server ip, username, DB username and DB password.
If you have used another name for database rather than "zeus", enter that name to this file field "DB_DATABASE".


## Creating project

Create a database named "zeus" in mysql.

While in the same folder where laravel install, enter 
composer create-project laravel/laravel –-prefer-dist zeus

This will create a project named zeus in same folder.

Create tables -> while in zeus folder, enter
php artisan migrate

Populate tables with users
php artisan db:seed

You can use following users and passwords to loging

Admin:: email->asanka@gmail.com,  pw->password

Company User:: email->ruwan@gmail.com, pw->password

Client:: email->hasitha@gmail.com, pw->password



