<p align="center">
    <h1><b>PHARMCY MANAGMENT SYSTEM</b> <sup>STK</sup></h1>
</p>

## About <b>PHARMCY MANAGMENT SYSTEM</b> <sup>STK</sup>

<b>PHARMCY MANAGMENT SYSTEM</b> <sup>STK</sup> is a web application built with laravel 7.14.1 which is a web application framework with expressive and an elegant syntax. Our managment system is build to faciltate usualy managments task that a pharmacy can have per day. This help to solve such as:

1.  Employees managment

    -   [x] Add, edit, delete an employee

    -   [x] List employees 

    -   [x] Set employee role

    -   [ ] Employees days sales report

    -   [ ] Employees months sales reports

2.  Suppliers managment

    -   [x] Add, edit, delete supplier

    -   [x] List suppliers

    -   [x] List a suppliers drugs (supplier drugs that are supplied to the pharmacy)

3.  Customers managment

    -   [x] Add, edit, delete customer

    -   [x] List customers

    -   [ ] List customers purchases (drugs that a customer bought)

    -   [ ] Customer loyality point

4.  POS (Point Of Sale) system

    -   [x] Search drug by barcode or by it's generic name

    -   [x] Search a customer or add a new one

    -   [ ] Calculate total amount

    -   [ ] Calculate due

5.  Drugs managment system

    -   [x] Add, edit, delete drug

    -   [x] List all drugs

    -   [x] Search drugs

    -   [ ] List drug suppliers


## How to install <b>PHARMCY MANAGMENT SYSTEM</b> <sup>STK</sup>

First of all, you must clone or download this repository on your desktop.

```
git clone https://github.com/StephaneKuma/pms.git
```

Now you must navigate to the project directories and install its dependencies

```
composer install
```

Copy the .env.example file to .env example and change the database connection information on the file to be the same us your database settings, create a database with the same name us in .env file and execute those commands :

```php
php artisan migrate:install

php artisan migrate --seed
```


To run the project execute this :

```php
php artisan serve
```

This command will start php internal server on the public directories of the project on the address 127.0.0.1:8000



## Screenshoots


![Login screen](/screenshoots/login.png)

![Registration screen](/screenshoots/registration.png)

![Reset password screen](/screenshoots/reset.png)
