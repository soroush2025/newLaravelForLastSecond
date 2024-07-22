<?php

namespace App\Jobs;

use App\Mail\BookingConfirmationEmail;
use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendBookingConfirmationEmailJob implements ShouldQueue
{
    use Queueable;
    protected $booking;

    /**
     * Create a new job instance.
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // Send the booking confirmation email
        Mail::to($this->booking->user_email)->send(new BookingConfirmationEmail($this->booking));
        // Update the booking status to 'confirmed'
        $this->booking->status = 'confirmed';
        $this->booking->save();
    }
}
