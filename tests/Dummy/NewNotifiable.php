<?php

namespace MadeITBelgium\LaravelExceptionMonitor\Test\Dummy;

use Illuminate\Notifications\Notifiable as NotifiableTrait;

class NewNotifiable
{
    use NotifiableTrait;

    public function routeNotificationForMail()
    {
        return 'info@example.com';
    }

    public function routeNotificationForSlack()
    {
        return '';
    }

    public function getKey()
    {
        return 1;
    }
}
