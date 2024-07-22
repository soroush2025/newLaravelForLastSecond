<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'user_name',
        'user_email',
        'slots_booked',
        'status',
        // Add other fields as necessary
    ];

    /**
     * Get the activity that owns the booking.
     */
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function reduceAvailableSlots()
    {
        $activity = $this->activity;
        $activity->available_slots -= $this->slots_booked;
        $activity->save();

        $this->activity()->decrement('available_slots');
    }
}
