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
      'date' => 'required|date|after_or_equal:today|before_or_equal:' . now()->addWeeks(2)->toDateString(),
      'time' => 'required|date_format:H:i',
      'guests' => 'required|integer|min:1|max:30',
      'note' => 'nullable|string|max:65535',
    ];
  }

  public function attributes()
  {
    return [
      'name' => trans('reservations.attributes.name'),
      'email' => trans('reservations.attributes.email'),
      'phone' => trans('reservations.attributes.phone'),
      'date' => trans('reservations.attributes.date'),
      'time' => trans('reservations.attributes.time'),
      'guests' => trans('reservations.attributes.guests'),
      'note' => trans('reservations.attributes.note'),
    ];
  }
}