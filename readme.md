# Laravel Exception Monitor
[![Build Status](https://travis-ci.org/madeITBelgium/Laravel-exception-monitor.svg?branch=master)](https://travis-ci.org/madeITBelgium/Laravel-exception-monitor)
[![Coverage Status](https://coveralls.io/repos/github/madeITBelgium/Laravel-exception-monitor/badge.svg?branch=master)](https://coveralls.io/github/madeITBelgium/Laravel-exception-monitor?branch=master)
[![Latest Stable Version](https://poser.pugx.org/madeitbelgium/laravel-exception-monitor/v/stable)](https://packagist.org/packages/madeitbelgium/laravel-exception-monitor)
[![Total Downloads](https://poser.pugx.org/madeitbelgium/laravel-exception-monitor/downloads)](https://packagist.org/packages/madeitbelgium/laravel-exception-monitor)
[![Latest Unstable Version](https://poser.pugx.org/madeitbelgium/laravel-exception-monitor/v/unstable)](https://packagist.org/packages/madeitbelgium/laravel-exception-monitor)
[![License](https://poser.pugx.org/madeitbelgium/laravel-exception-monitor/license)](https://packagist.org/packages/madeitbelgium/laravel-exception-monitor)
[![Monthly Downloads](https://poser.pugx.org/madeitbelgium/laravel-exception-monitor/d/monthly)](https://packagist.org/packages/madeitbelgium/laravel-exception-monitor)
[![Daily Downloads](https://poser.pugx.org/madeitbelgium/laravel-exception-monitor/d/daily)](https://packagist.org/packages/madeitbelgium/laravel-exception-monitor)
[![composer.lock](https://poser.pugx.org/madeitbelgium/laravel-exception-monitor/composerlock)](https://packagist.org/packages/madeitbelgium/laravel-exception-monitor)

#Installation

Require this package in your `composer.json` and update composer.

```php
"madeitbelgium/laravel-exception-monitor": "~1.*"
```
https://github.com/GrahamCampbell/Laravel-Exceptions
```php
composer require madeitbelgium/laravel-exception-monitor
```

After updating composer, add the ServiceProvider to the providers array in `config/app.php`

```php
MadeITBelgium\LaravelExceptionMonitor\ExceptionMonitorServiceProvider::class,
```
You must publish the config file:

```php
php artisan vendor:publish --provider="MadeITBelgium\LaravelExceptionMonitor\ExceptionMonitorServiceProvider"

```
Replace the extends class of /app/Exceptions/Handler.php

```php
use MadeITBelgium\LaravelExceptionMonitor\MonitorExceptionHandler;
...
class Handler extends MonitorExceptionHandler

```

# Documentation

The complete documentation can be found at: [(http://www.madeit.be](http://www.madeit.be)

# Support

Support github or mail: info@madeit.be

# Contributing

Please try to follow the psr-2 coding style guide. http://www.php-fig.org/psr/psr-2/

# License

This package is licensed under LGPL. You are free to use it in personal and commercial projects. The code can be forked and modified, but the original copyright author should always be included!