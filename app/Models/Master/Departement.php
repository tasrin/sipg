<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $table = 'tb_departement';
    protected $fillable = ['name'];

    public function getNameAttribute($name)
    {
        return strtoupper($name);
    }
}
