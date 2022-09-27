# Laravel5-Admin

[![Build Status](https://travis-ci.org/brosbunbo/Laravel5-Admin.png?branch=master)](http://travis-ci.org/brosbunbo/Laravel5-Admin)

An administration template for Laravel 5.

## Contents

- [Installation](#installation)
- [Configuration](#configuration)
    - [Config](#config)
    - [Database](#database)

## Installation

Add to composer.json

    "brosbunbo/laravel5-admin": "1.0"

I use entrust for user role. Because entrust has not stable support for laravel 5 yet, add this to composer.json

    "minimum-stability": "dev",
    "prefer-stable": true

Update new package only

    composer update brosbunbo/laravel5-admin

## Configuration

###Config

Open `config/app.php` and add

    'BunBo\Providers\BunBoServiceProvider'
    'Zizaco\Entrust\EntrustServiceProvider'

to  `providers` array and

    'Entrust'   => 'Zizaco\Entrust\EntrustFacade'

to `aliases` array

Edit `config/auth.php`

    'model' => 'BunBo\User'

Edit `config/entrust.php`

    'role' => 'BunBo\Role'
    'permission' => 'BunBo\Permission'

Publish package resource

    php artisan vendor:publish
    composer dump-autoload -o

### Database

Migrate

    php artisan migrate

Add to `database/seeds/DatabaseSeeder.php`

    $this->call('RoleTableSeeder');
    $this->call('AdminAccountSeeder');

Seed

    php artisan db:seed

## Usage

Pheww, take a breath after such an installation :(

The admin panel is at /admin.

Default account is `admin@admin.com`/`admin`. You can change this by edit `datatabase/seeds/AdminAccountSeeder.php` and run `php artisan db:seed` again
