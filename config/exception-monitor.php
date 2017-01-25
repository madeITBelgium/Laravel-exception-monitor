<?php

return [

    /*
     * The notification that will be sent.
     */
    'notification' => [
        'exception' => \MadeITBelgium\LaravelExceptionMonitor\Notifications\ExceptionNotification::class,
        'job'       => \MadeITBelgium\LaravelExceptionMonitor\Notifications\JobNotification::class,
    ],

    /*
     * The notifiable to which the notification will be sent. The default
     * notifiable will use the mail and slack configuration specified
     * in this config file.
     */
    'notifiable' => [
        'exception' => \MadeITBelgium\LaravelExceptionMonitor\Notifiable::class,
        'job'       => \MadeITBelgium\LaravelExceptionMonitor\Notifiable::class,
    ],

    /*
     * The channels to which the notification will be sent.
     */
    'channels' => ['mail', 'slack'],
    'mail'     => [
        'to' => 'email@example.com',
    ],
    'slack' => [
        'webhook_url' => env('FAILED_JOB_SLACK_URL'),
    ],
];
