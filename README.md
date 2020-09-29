# Social Network with Laravel

In this project we have learnt to work with Laravel and Database. The idea was understand how to create a database structure and how to send and show users information through axios and Laravel.

## Installation

First install npm and all the dependences that you want to use.
```bash
npm install
```

Install composer to work with Laravel
```bash
composer global require laravel/installer
```

Also we have to run jetstream
```bash
composer require laravel/jetstream

php artisan jetstream:install livewire

php artisan jetstream:install inertia
```

If you have problems clonning the project execute:
```bash
cp .env.example .env
```

And then you have to generate a key for .env file
```bash
php artisan key:generate
```

Finally you can open the project with artisan.
```bash
php artisan serv
```

## Usage

To navigate throught the project, interact with it as a usual social network. You can sign up and you can start to interact with your friends.
In our social network you can create, update and delete posts also you can edit your profile image and description, add friends, search posts and friends.