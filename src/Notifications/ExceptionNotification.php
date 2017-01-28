<?php

namespace MadeITBelgium\LaravelExceptionMonitor\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackAttachment;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification as IlluminateNotification;
use Illuminate\Support\Facades\Request;

/**
 * Laravel Exception monitor.
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2017 Made I.T. (http://www.madeit.be)
 * @author     Made I.T. <info@madeit.be>
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 */
class ExceptionNotification extends IlluminateNotification
{
    /** @var \Exception */
    protected $exception;

    /**
     * Get the method to where the notification needs to be sent.
     *
     * @return array
     */
    public function via($notifiable)
    {
        return config('exception-monitor.channels');
    }

    /**
     * Set the Exception.
     *
     * @return self
     */
    public function setException(Exception $exception)
    {
        $this->exception = $exception;

        return $this;
    }

    /**
     * Get the Exception.
     *
     * @return Exception
     */
    public function getException()
    {
        return $this->exception;
    }

    /**
     * Mail notification.
     *
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        $e = $this->exception;

        return (new MailMessage())
            ->error()
            ->subject('An exception was thrown at '.config('app.url'))
            ->line('Exception message: '.$e->getMessage())
          //  ->line('Hash: '.ExceptionHelper::hash($e))
          //  ->line('Http code: '.ExceptionHelper::statusCode($e))
            ->line('Code: '.$e->getCode())
            ->line('File: '.$e->getFile())
            ->line('Line: '.$e->getLine())
            ->line('Request url: '.Request::url())
            ->line('Request method: '.Request::method())
            ->line('Request param: '.json_encode(Request::all()));
    }

    /**
     * Slack notification.
     *
     * @return SlackMessage
     */
    public function toSlack()
    {
        $e = $this->exception;
        $fields = [
            'Exception'      => get_class($e),
          //  'Hash'           => ExceptionHelper::hash($e),
          //  'Http code'      => ExceptionHelper::statusCode($e),
            'Code'           => $e->getCode(),
            'File'           => $e->getFile(),
            'Line'           => $e->getLine(),
            'Request url'    => Request::url(),
            'Request method' => Request::method(),
            'Request param'  => json_encode(Request::all()),
        ];

        return (new SlackMessage())
            ->from(config('app.url'))
            ->error()
            ->content($e->getMessage())
            ->attachment(function (SlackAttachment $attachment) use ($fields) {
                $attachment->fields($fields);
            });
    }
}
