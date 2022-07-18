<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(TableRoles::class);
        $this->call(TablePosition::class);
        $this->call(TableAttendance::class);
        $this->call(TableDepartement::class);
        $this->call(TableUsers::class);
    }
}
