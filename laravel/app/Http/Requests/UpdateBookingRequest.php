<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'activity_id' => 'sometimes|exists:activities,id',
            'user_name' => 'sometimes|string|max:255',
            'user_email' => 'sometimes|email|max:255',
            'slots_booked' => 'sometimes|integer|min:1',
            'status' => 'sometimes|in:pending,confirmed,cancelled',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }
}
