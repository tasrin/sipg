<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    public $ket_schedule = [
        'Morning(05:00-14:00)',
        'Afternoon(13:00-22:00)',
        'Middle Morning(10:00-19:00)',
        'Middle Afternoon(12:00-21:00)',
        'Evening (19:00-04:00)',
        'Mignight (22:00-07:00)'
    ];

    public $status = [
        'Staff',
        'Daily Worker',
    ];

    public $attendance = [
        'Hadir','Permision','Sick','Alpha'
    ];
}
