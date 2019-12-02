<?php

namespace App\Listeners;

use App\Events\MyEventClass;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\MyJob;

class ThingToDoAfterEventWasFired implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MyEventClass  $event
     * @return void
     */
    public function handle(MyEventClass $event)
    {
        //
        dispatch(new MyJob());
    }
}
