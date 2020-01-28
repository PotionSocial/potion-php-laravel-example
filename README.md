# Potion Social Laravel PHP Twitter like

This example built with Laravel PHP, shows you how you can use [Potion Social API](https://potion.social/ "Potion Social API") to build a twitter like stream. It is a really basic app allowing you to post a status, list them, like them, delete them and change your current user session.

## Install

We assume you know how to install a Laravel project on your OS, if you are new with Laravel, please follow the instructions on [Laravel Website](https://laravel.com/docs/6.x "Laravel Website") before going further.

Once the project cloned, go to the cloned directory with your terminal and run the following command:

`composer install`

You can now configure your project, thee steps below.

## Configure

Before running the project, please follow those steps in order for the app to run properly.

### Configure environment file

Open `.env.example` and fill it with your Potion Social Credentials, if you do not own credentials, create a free account on [Potion Social API Builder](https://api.potion.social/ "Potion Social API Builder").

Final Potion Social API config in `.env` file should look a bit like this :

```
# Potion Social API config
POTION_API_URL=https://mynetwork.potion.social
POTION_API_KEY=982Y5kshdbflKHLKD-DHfsjf
POTION_API_SECRET=bxfMKJHFShjdkhè8ukhj
```

Once done, rename the file to `.env` and go to next step

### Generate Application key for Laravel.

Simply go to the project folder with your terminal and run the following command:

`php artisan key:generate`

Thats all! The application is configured now.

## Run

`php artisan serve`

## Extend

Do not hesitate to extend this example or to send us your application using Potion Social API.
