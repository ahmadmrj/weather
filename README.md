# Weather
This app get weather forecast values from **hypothetical** sources and return the average amount of them in both **Celsius** and **Fahrenheit** scales.

## Installation
It developed by [Symfony](https://symfony.com/) framework so you can install dependencies by composer.
```
composer install
```

### Loading default values
There is some default values like assumed partners which should be loaded by executing migrations and fixtures. So, after setting up your database configs in ***.env*** file, run migration:
```
php bin/console doctrine:migrations:migrate
```
then to load default data of partners load fixtures:
```
php bin/console doctrine:fixtures:load
```

## Run
You can use Symfony server to serve this app by:
```
symfony server:start
```
There is just one route with GET method and it needs a valid date for it's input:
```
http://127.0.0.1:8000/api/prediction/2019-12-28
```
