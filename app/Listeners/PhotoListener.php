<?php

namespace App\Listeners;

use App\Events\PhotoHasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PhotoListener
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
     * @param  PhotoHasCreated  $event
     * @return void
     */
    public function created(PhotoHasCreated $event)
    {
        var_dump('Photo from event' . $event->photo->path );
    }
}
