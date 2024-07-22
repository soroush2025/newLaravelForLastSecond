<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;


class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'price',
        'available_slots',
        'image',
        // Add other fields as necessary
    ];


    /**
     * Get all of the comments for the Activity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Bookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'activity_id');
    }

    public function setImageAttribute($value)
    {
        if ($value && is_file($value)) {
            $filename = time() . '.' . $value->getClientOriginalExtension();
            Storage::put('public/images/activities/' . $filename, file_get_contents($value));
            $this->attributes['image'] = 'images/activities/' . $filename;
        }
    }

    public function imageUrl(): Attribute
    {
        return Attribute::get(fn()=> $this->image ? Storage::url($this->image) : null);
    }
}
