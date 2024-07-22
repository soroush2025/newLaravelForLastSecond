@component('mail::message')
# Booking Confirmation

Hello {{ $booking->user_name }},

Thank you for your booking. Here are your booking details:

- **Activity:** {{ $booking->activity->name }}
- **Slots Booked:** {{ $booking->slots_booked }}
- **Status:** {{ $booking->status }}

Thank you for choosing us!

Thanks,<br>
{{ config('app.name') }}
@endcomponent

