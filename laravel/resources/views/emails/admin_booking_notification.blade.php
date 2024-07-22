@component('mail::message')
# New Booking Notification

A new booking has been made. Here are the details:

- **User Name:** {{ $booking->user_name }}
- **User Email:** {{ $booking->user_email }}
- **Activity:** {{ $booking->activity->name }}
- **Slots Booked:** {{ $booking->slots_booked }}
- **Status:** {{ $booking->status }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
