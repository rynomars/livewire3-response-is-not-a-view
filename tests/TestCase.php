<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabaseState;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;


    protected bool $eventFake = false;

    protected bool $mailFake = true;

    protected bool $notificationFake = true;

    protected bool $queueFake = true;

    protected function setUp(): void
    {
        /*
         * If the variable $NO_MIGRATION variable is set, set the migrated var to true.
         * This prevents phpunit from running migration before starting tests. This variable
         * is set in the no-migration.php file. This is called with --bootstrap no-migration.php
         * parameter when calling phpunit.
         */
        global $NO_MIGRATION;

        if ($NO_MIGRATION) {
            RefreshDatabaseState::$migrated = true;
        }


        parent::setUp();

        Http::preventStrayRequests();

        if ($this->queueFake) {
            Facades\Queue::fake();
        }

        if ($this->mailFake) {
            Facades\Mail::fake();
        }

        if ($this->eventFake) {
            Facades\Event::fake();
        }

        if ($this->notificationFake) {
            Facades\Notification::fake();
        }
    }
}
