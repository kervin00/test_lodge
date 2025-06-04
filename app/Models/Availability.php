<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'number_of_guests',
    ];
}
