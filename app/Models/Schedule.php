<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\Staff;

class Schedule extends Model
{
    protected $table = 'tb_schedule';
    protected $fillable = ['staff_id', 'position_id', 'departement_id', 'tgl_masuk', 'ket_schedule', 'status'];
    protected $dates = ['deleted_at'];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}
