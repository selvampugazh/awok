# awok

## Installation

update the db name and login details in the .env file

    .env file

Generate a new application key

    php artisan key:generate

Generate a new JWT authentication secret key

    php artisan jwt:secret

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the database seeders

    php artisan db:seed

Install the javascript dependencies using npm

    npm install

Compile the dependencies

    npm run development

For generating the files of unisharp file manager

    php artisan vendor:publish --tag=lfm_public

For linking storage folder in public
    
    php artisan storage:link

Start the local development server

    php artisan serve



You can now access the server at http://localhost:8000

**TL;DR command list**

    composer install
    npm install
    npm run development
    php artisan storage:link
    php artisan key:generate
    php artisan jwt:secret
    php artisan vendor:publish --tag=lfm_public

## Logging In

`php artisan db:seed` adds three users with respective roles. The credentials are as follows:

* Administrator: `admin@awok.com`

Password: `123456`

##if faced issues with jwt package - LaravelServiceProvider class not found

`composer require tymon/jwt-auth:"^1.0.0-rc.2"`
