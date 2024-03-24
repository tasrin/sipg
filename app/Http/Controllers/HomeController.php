<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\Schedule;
use App\Models\Users;
use App\Models\Master\Staff;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $data['salary'] = Salary::count();   
        $data['schedule'] = Schedule::count();   
        $data['staff'] = Staff::count();
        $data['users'] = Users::count();      
        return view('home', $data);
    }

    public function getStaffPosition()
    {
        $data = DB::table('tb_staff', 'a')
                    ->groupBy( 'a.position_id' )
                    ->orderBy('name_position', 'asc')
                    ->select(DB::raw('count(a.position_id) as count, tb_position.name as name_position'))
                    // ->where('periode', $id)
                    ->join('tb_position', 'tb_position.id', '=', 'a.position_id')
                    ->get();
        return response()->json($data);
    }

    public function getStaffDepartement()
    {
        $data = DB::table('tb_staff', 'a')
                    ->groupBy( 'a.departement_id' )
                    ->orderBy( 'name_departement', 'asc' )
                    ->select(DB::raw('count(a.departement_id) as count, tb_departement.name as name_departement'))
                    // ->where('periode', $id)
                    ->join('tb_departement', 'tb_departement.id', '=', 'a.departement_id')
                    ->get();
        return response()->json($data);
    }
}
