<?php

namespace App\Reservations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Reservations\Reservation
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property Carbon $date
 * @property string $time
 * @property int $guests
 * @property string|null $special_requests
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Reservation extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'date',
        'time',
        'guests',
        'special_requests',
    ];

    protected $casts = [
        'date' => Carbon::class,
    ];
}
