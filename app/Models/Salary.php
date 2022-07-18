<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\Staff;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salary extends Model
{
    use SoftDeletes;

    protected $table = 'tb_salary';
    protected $fillable = ['staff_id', 'salary', 'uang_overtime', 'jumlah_overtime', 'pot_bpjs', 'transportasi', 'total', 'periode', 'status', 'tgl_salary', 'status_gaji'];
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
