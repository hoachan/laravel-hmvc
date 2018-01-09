<?php

namespace App\Listeners;

use App\Events\TagEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Log;

class TagListener implements ShouldQueue
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
     * @param  TagEvent  $event
     * @return void
     */
    public function handle(TagEvent $event)
    {
        Log::info("log to tag listener" , $event->tag['data'][0]);
    }
}
