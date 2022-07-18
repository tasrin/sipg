<?php

use Illuminate\Database\Seeder;
use App\Models\Master\Departement;

class TableDepartement extends Seeder
{
    public function run()
    {
        $departement = [
            ['name'=>'House Keeping'],
            ['name'=>'Front Office'],
            ['name'=>'F&B Service'],
            ['name'=>'F&B Production'],
        ];
        foreach($departement as $row)
        {
            Departement::create($row);
        }
    }
}
