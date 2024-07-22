<?php

namespace App\Listeners;

use App\Events\BookingCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminBookingNotificationEmail;

class NotifyAdminOfBooking
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BookingCreated $event): void
    {
        {
            // Notify admin via email
            Mail::to(config('mail.admin_email'))->send(new AdminBookingNotificationEmail($event->booking));
        }
    }
}
