<?php

namespace MadeITBelgium\LaravelExceptionMonitor\Test;

use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\Notification as NotificationFacade;
use MadeITBelgium\LaravelExceptionMonitor\ExceptionMonitorServiceProvider;
use MadeITBelgium\LaravelExceptionMonitor\Notifiable;
use MadeITBelgium\LaravelExceptionMonitor\Notifications\ExceptionNotification;
use MadeITBelgium\LaravelExceptionMonitor\Notifications\JobNotification;
use MadeITBelgium\LaravelExceptionMonitor\Test\Dummy\Job;
use MadeITBelgium\LaravelExceptionMonitor\Test\Dummy\NewNotifiable;
use MadeITBelgium\LaravelExceptionMonitor\Test\Dummy\NewJobNotification;
use Orchestra\Testbench\TestCase;

class FailedJobTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        NotificationFacade::fake();
    }

    protected function getPackageProviders($app)
    {
        return [ExceptionMonitorServiceProvider::class];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('queue.default', 'sync');
    }

    public function testSendNotificationWhenJobFailed()
    {
        $this->fireFailedEvent();
        NotificationFacade::assertSentTo(new Notifiable(), JobNotification::class);
    }

    public function testSendNotificationWhenJobFailedtoNewNotifiable()
    {
        $this->app['config']->set('exception-monitor.notifiable.job', NewNotifiable::class);
        $this->fireFailedEvent();
        NotificationFacade::assertSentTo(new NewNotifiable(), JobNotification::class);
    }

    public function testSendNotificationWhenJobFailedtoNewNotification()
    {
        $this->app['config']->set('exception-monitor.notification.job', NewJobNotification::class);
        $this->fireFailedEvent();
        NotificationFacade::assertSentTo(new Notifiable(), NewJobNotification::class);
    }

    protected function fireFailedEvent()
    {
        return event(new JobFailed('test', new Job(), new \Exception()));
    }
}
