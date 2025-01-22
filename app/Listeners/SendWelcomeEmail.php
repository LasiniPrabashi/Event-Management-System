<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail
{
    public $user;
    use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public function __construct(User $user)
    {
        //
        $this->user = $user;
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event)
    {
        Mail::to($event->user->email)->send(new WelcomeMail($event->user));

        }



}
