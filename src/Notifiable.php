<?php

namespace MadeITBelgium\LaravelExceptionMonitor;

use Illuminate\Notifications\Notifiable as NotifiableTrait;

/**
 * Laravel Exception monitor.
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2017 Made I.T. (http://www.madeit.be)
 * @author     Made I.T. <info@madeit.be>
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 */
class Notifiable
{
    use NotifiableTrait;

    /**
     * Get the email address for the mail notification.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return config('exception-monitor.mail.to');
    }

    /**
     * Get the Slack Webhook URL for the Slack notification.
     *
     * @return string
     */
    public function routeNotificationForSlack()
    {
        return config('exception-monitor.slack.webhook_url');
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return 1;
    }
}
