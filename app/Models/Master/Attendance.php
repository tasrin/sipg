<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'tb_attendance';
    protected $fillable = ['name', 'value'];
}
