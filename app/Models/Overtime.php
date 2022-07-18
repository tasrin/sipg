<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\Staff;

class Overtime extends Model
{
    protected $table = 'tb_overtime';
    protected $fillable = ['staff_id', 'jumlah_overtime', 'tgl_overtime'];

    public function getTglovertimeAttribute($name)
    {
        return date('d-m-Y', strtotime($name));
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
