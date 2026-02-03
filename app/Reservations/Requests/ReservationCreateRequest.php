<?php

namespace App\Reservations\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationCreateRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'name' => 'required|string|max:255',
      'email' => 'required|email',
      'phone' => 'nullable|string|max:20',
      //date must today or smaller 2 weeks in future
      'date' => 'required|date|after_or_equal:today|before_or_equal:' . now()->addWeeks(2)->toDateString(),
      'time' => 'required|date_format:H:i',
      'guests' => 'required|integer|min:1|max:30,',
      // maximum text length for database field tpye TEXT
      'special_requests' => 'nullable|string|max:65535',
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'Guest name is required',
      'date.after_or_equal' => 'Reservation date must be today or later',
      'guests.max' => 'Maximum 20 guests allowed',
    ];
  }
}