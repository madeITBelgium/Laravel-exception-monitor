# Laravel Exception Monitor
[![Build Status](https://travis-ci.org/madeITBelgium/Laravel-exception-monitor.svg?branch=master)](https://travis-ci.org/madeITBelgium/Laravel-exception-monitor)
[![Coverage Status](https://coveralls.io/repos/github/madeITBelgium/Laravel-exception-monitor/badge.svg?branch=master)](https://coveralls.io/github/madeITBelgium/Laravel-exception-monitor?branch=master)


#Installation

Require this package in your `composer.json` and update composer.

```php
"madeitbelgium/laravel-exception-monitor": "~1.*"
```

```php
composer require spatie/laravel-exception-monitor
```

After updating composer, add the ServiceProvider to the providers array in `config/app.php`

```php
MadeITBelgium\LaravelExceptionMonitor\ExceptionMonitorServiceProvider::class,
```
You must publish the config file:

```php
php artisan vendor:publish --provider="MadeITBelgium\LaravelExceptionMonitor\ExceptionMonitorServiceProvider"

```

# Documentation

The complete documentation can be found at: [(http://www.madeit.be](http://www.madeit.be)

# Support

Support github or mail: info@madeit.be

# Contributing

Please try to follow the psr-2 coding style guide. http://www.php-fig.org/psr/psr-2/

# License

This package is licensed under LGPL. You are free to use it in personal and commercial projects. The code can be forked and modified, but the original copyright author should always be included!