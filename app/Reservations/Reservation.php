<?php

namespace App\Reservations;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'date',
        'time',
        'guests',
        'note'
    ];
}
