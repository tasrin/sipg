<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Master\Staff;
use App\Models\Master\Keterangan;

class ScheduleController extends Controller
{
    public function index()
    {
        $data['schedule'] = Schedule::all();
        $data['count'] = Schedule::count();
        return view('schedule.index', $data);
    }

    public function create()
    {
        $data['title'] = "Buat Schedule";
        $data['staff'] = Staff::all();
        $value = new Keterangan();
        $data['ket_schedule'] = $value->ket_schedule;
        $data['status'] = $value->status;
        return view('schedule.create', $data);
    }
    
    public function store(Request $request)
    {   
        $request->validate([
            'staff_id'=>'required|unique:tb_schedule',
            'tgl_masuk'=>'required|date',
            'ket_schedule'=>'required',
            // 'status'=>'required',
        ]);

        Schedule::create($request->all());

        $message = [
            'alert-type'=>'success',
            'message'=> 'Data schedule created successfully'
        ];  
        return redirect()->route('schedule.index')->with($message);
    }

    public function edit(Schedule $schedule)
    {
        $data['title'] = "Edit schedule";
        $data['staff'] = Staff::all();
        $value = new Keterangan();
        $data['ket_schedule'] = $value->ket_schedule;
        $data['status'] = $value->status;
        $data['schedule'] = $schedule;
        return view('schedule.edit', $data);
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'staff_id'=>'required',
            'tgl_masuk'=>'required|date',
            'ket_schedule'=>'required',
            // 'status'=>'required',
        ]);

        $schedule->update($request->all());

        $message = [
            'alert-type'=>'success',
            'message'=> 'Data schedule updated successfully'
        ];  
        return redirect()->route('schedule.index')->with($message);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        if($id)
        {   
            $schedule = Schedule::find($id);
            if($schedule)
            {
                $schedule->delete();
            }
            $count = Schedule::count();
            $message = [
                'alert-type' => 'success',
                'count' => $count,
                'message' => 'Data schedule deleted successfully.'
            ];
            return response()->json($message);
        }
    }
}
