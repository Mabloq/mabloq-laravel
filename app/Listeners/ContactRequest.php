<?php

namespace App\Listeners;

use App\Events\ContactResponse;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactRequest
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
     * @param  ContactResponse  $event
     * @return void
     */
    public function handle(ContactResponse $event)
    {
        //
    }
}
