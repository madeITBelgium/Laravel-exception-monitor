<?php

namespace MadeITBelgium\LaravelExceptionMonitor\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackAttachment;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification as IlluminateNotification;
use Illuminate\Queue\Events\JobFailed;

/**
 * Laravel Exception monitor.
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2017 Made I.T. (http://www.madeit.be)
 * @author     Made I.T. <info@madeit.be>
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 */
class JobNotification extends IlluminateNotification
{
    /** @var \Illuminate\Queue\Events\JobFailed */
    protected $event;

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
     * Set the event.
     *
     * @return self
     */
    public function setEvent(JobFailed $event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get the event.
     *
     * @return JobFailed
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Mail notification.
     *
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->error()
            ->subject('A job failed at '.config('app.url'))
            ->line('Exception message: '.$this->event->exception->getMessage())
            ->line('Job class: '.$this->event->job->resolveName())
            ->line('Job body: '.$this->event->job->getRawBody())
            ->line('Exception: '.$this->event->exception->getTraceAsString());
    }

    /**
     * Slack notification.
     *
     * @return SlackMessage
     */
    public function toSlack()
    {
        return (new SlackMessage())
            ->error()
            ->content('A job failed at '.config('app.url'))
            ->attachment(function (SlackAttachment $attachment) {
                $attachment->fields([
                    'Exception message' => $this->event->exception->getMessage(),
                    'Job class'         => $this->event->job->resolveName(),
                    'Job body'          => $this->event->job->getRawBody(),
                    'Exception'         => $this->event->exception->getTraceAsString(),
                ]);
            });
    }
}
