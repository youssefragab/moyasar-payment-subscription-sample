## Description
subscription system with user authentication and moyasar payment gateway
## Installation
Requirements:
```
PHP 8.1
```
After downloading source code run the following:
```
composer install
php artisan module:migrate User
php artisan module:migrate Plan
php artisan module:migrate Subscription
php artisan module:seed User
php artisan module:seed Plan
php artisan module:seed Subscription
```
