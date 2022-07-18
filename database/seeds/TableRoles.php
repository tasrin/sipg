<?php

use Illuminate\Database\Seeder;
use App\Models\Roles;

class TableRoles extends Seeder
{
    public function run()
    {
        $roles = [
            ['name'=>'admin', 'display_name'=>'Administrator'],
            ['name'=>'karyawan', 'display_name'=>'Karyawan'],
        ];
        foreach($roles as $row)
        {
            Roles::create($row);
        }
    }
}
