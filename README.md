# Overview 

Development of an application for a store that has two types of user: role and administrator. It has login and user registration. Developed in PHP using Laravel as framework, a mysql database and implementing MVC.

# Requirements

- php 8.1.11
- composer 2.4.2
- mysql 8.0
- Bootstrap 5.3

# How to Install

1. Clone the repository

        git clone https://github.com/mpauher/products-laravel.git

2. Install dependencies

        composer install

3. Copy the .env.example file to .env

        cp .env.example .env

4. Generate a new application key

        php artisan key:generate

5. Run the database migrations, and faker data to Users and Products

        php artisan migrate --seed

6. Start the local development server

        php artisan serve

7. Visit http://localhost:8000 to check.

### Optionals files

> - Postman Collection: /calendars_node.postman_collection.json

## Built With

- [Laravel](https://laravel.com/)
- [Composer](https://getcomposer.org/)

## Authors

- María Paula Hernández

## License

This project is licensed under the MIT License.

