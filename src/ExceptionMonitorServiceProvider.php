<?php

namespace MadeITBelgium\LaravelExceptionMonitor;

use Illuminate\Support\ServiceProvider;

/**
 * Laravel Exception monitor.
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2017 Made I.T. (http://www.madeit.be)
 * @author     Made I.T. <info@madeit.be>
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 */
class ExceptionMonitorServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/exception-monitor.php' => config_path('exception-monitor.php'),
        ], 'config');

        //$this->app->make(ExceptionNotifier::class);
        $this->app->make(FailedJobNotifier::class)->register();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/exception-monitor.php',
            'exception-monitor'
        );
        //$this->app->singleton(ExceptionNotifier::class);
        $this->app->singleton(FailedJobNotifier::class);
    }
}
