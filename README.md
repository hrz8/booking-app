# Booking Reports (Laravel 8.x)

## Quick Start

### Reuirements

```bash
PHP >= 7.3
MySQL
```

### Usage

``` bash
# Install required packages
$ composer update
```

``` bash
# Create booking_app db
msql> CREATE DATABASE booking_app;
```

``` bash
# Initiate database
$ php artisan migrate
$ php artisan db:seed
```

``` bash
# Run server
$ php artisan serve
# OR
Start Debug on VSCode (required Xdebug)
```

### Database

![erd screenshot](https://github.com/hrz8/booking-app/blob/master/db.png?raw=true)

#### Available Endpoints

Default dev url and port is: `127.0.0.1:8000`

*Notes:
- All generated users has `12345678` as default password from `db:seed`.
- All endpoints need jwt auth except `/api/login`.
- All endpoints need permission for user authorization except `/api/login`.
- `adminroot` user has permissions to access all endpoints.
- Permission to each endpoint configured like this:

    ``` php
    Route::get('/api/end-point', [Controller::class, 'action'])
        ->middleware('common:canView,canViewDetail');
    ```

- Where `common` is middleware for handling permission to each endpoint. While `canView` and `canViewDetail` is permission that user needed to access the endpoint which is defined on `permissions` table on database.
- User's permission mapped thru `users_permissions` table.

`POST /api/login`

``` json
{
    "username": "adminroot",
    "password": "12345678"
}
```

`GET /api/bookings`
``` json
# Header
{
    "Authorization": "Bearer jwttokenwhichgeneratedwhenlogin",
}
```

`GET /api/users/bookings`
``` json
# Header
{
    "Authorization": "Bearer jwttokenwhichgeneratedwhenlogin",
}
```

## App Info

### Authors

Hirzi Nurfakhrian

### Version

1.0.0