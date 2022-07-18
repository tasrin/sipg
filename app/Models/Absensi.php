<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\Attendance;

class Absensi extends Model
{
    protected $table = 'tb_absensi';
    protected $fillable = ['schedule_id', 'periode', 'attendance_id', 'tanggal_absen', 'jumlah_lembur', 'waktu_masuk', 'waktu_keluar'];

    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }

    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }
}
