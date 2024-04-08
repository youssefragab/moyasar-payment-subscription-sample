## Description
subscription system with user authentication and moyasar payment gateway
## Installation
Requirements:
```
PHP 8.1
```
rename .env.example to .env and update database information
then run the following in your terminal:
```
composer install
php artisan module:migrate User
php artisan module:migrate Plan
php artisan module:migrate Subscription
php artisan module:seed User
php artisan module:seed Plan
php artisan module:seed Subscription
php artisan key:generate
```
## Moyasar Payment Setup
add the following lines to .env file and set them based on your moyasar account:
```
MOYASAR_PUBLISH_API_KEY=
MOYASAR_SECRET_API_KEY=
```
## Demo User
```
Email: john@gmail.com
Password: 12345678