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

#### Available Endpoints

Default dev url and port `127.0.0.1:8000`

`POST /api/login`
> all generated users has `12345678` as password default and can only access `/login` endpoint. While `adminroot` user has permissions to access all endpoints.
``` bash
{
    "username": "adminroot",
    "password": "12345678"
}
```

`GET api//bookings`
``` bash
# Header
{
    "Authorization": "Bearer jwttokenwhichgeneratedwhenlogin",
}
```

`GET api//users/bookings`
``` bash
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