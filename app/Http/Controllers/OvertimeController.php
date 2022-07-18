<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Overtime;
use App\Models\Master\Staff;

class OvertimeController extends Controller
{
    public function index()
    {
        $data['overtime'] = Overtime::all();
        $data['count']    = Overtime::count();
        return view('overtime.index', $data);
    }

    public function create()
    {
        $data['title'] = "Buat overtime";
        $data['staff'] = Staff::all();
        return view('overtime.create', $data);
    }

    public function store(Request $request)
    {   
        $request->validate([
            'staff_id'=>'required',
            'jumlah_overtime'=>'required|max:2',
            'tgl_overtime'=>'required|date',
        ]);

        overtime::create($request->all());

        $message = [
            'alert-type'=>'success',
            'message'=> 'Data overtime created successfully'
        ];  
        return redirect()->route('overtime.index')->with($message);
    }

    public function edit(Overtime $overtime)
    {
        $data['title'] = "Edit overtime";
        $data['staff'] = Staff::all();
        $data['overtime'] = $overtime;
        return view('overtime.edit', $data);
    }

    public function update(Request $request, Overtime $overtime)
    {
       
        $request->validate([
            'staff_id'=>'required',
            'jumlah_overtime'=>'required|max:2',
            'tgl_overtime'=>'required|date',
        ]);

        $overtime->update($request->all());

        $message = [
            'alert-type'=>'success',
            'message'=> 'Data overtime updated successfully'
        ];  
        return redirect()->route('overtime.index')->with($message);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        if($id)
        {   
            $overtime = Overtime::find($id);
            if($overtime)
            {
                $overtime->delete();
            }
            $count = Overtime::count();
            $message = [
                'alert-type' => 'success',
                'count' => $count,
                'message' => 'Data overtime deleted successfully.'
            ];
            return response()->json($message);
        }
    }
}
