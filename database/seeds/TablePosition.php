<?php

use Illuminate\Database\Seeder;
use App\Models\Master\Position;

class TablePosition extends Seeder
{
    public function run()
    {
        $position = [
            ['name'=>'Cheif', 'status'=>'Staff', 'salary'=>3000000],
            ['name'=>'Manager', 'status'=>'Staff', 'salary'=>5000000],
            ['name'=>'Supervisor', 'status'=>'Staff', 'salary'=>3500000],
            ['name'=>'Head', 'status'=>'Staff', 'salary'=>6000000],
            ['name'=>'Helper', 'status'=>'Staff', 'salary'=>3000000],
        ];
        foreach($position as $row)
        {
            Position::create($row);
        }
    }
}
