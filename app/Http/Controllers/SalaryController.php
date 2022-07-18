<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\Absensi;
use App\Models\Schedule;
use App\Models\Master\Staff;
use App\Models\Master\Position;
use DB;

class SalaryController extends Controller
{
    public function index(Request $request)
    {
        //hapus session salary jika ada
        $request->session()->put('salary');

        $salary = new Salary();
        $data['salary']    = $salary->groupBy( 'staff_id' )
                ->orderBy( 'staff_id' )
                ->select(DB::raw('count(*) as count, tb_salary.*'))
                ->get();
        $data['count'] = count($data['salary']);
        return view('salary.index', $data);
    }

    public function create(Request $request)
    {
        $data['title'] = "Buat Salary";
        $data['month'] = array("","Januari","Februari","Maret","April","Mei","Juni","Juli", 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $data['salary'] = $request->session()->get('salary');
        // dd($data['salary']['status']);
        return view('salary.create', $data);
    }

    public function store(Request $request)
    {   
        $request->validate([
            'status'=>'required',
            'periode'=>'required'
        ]);

        if(empty($request->session()->get('salary')))
        {
            $salary = new Salary();
            $salary->fill($request->all());
            $request->session()->put('salary', $salary);
        }
        else
        {
            $salary = $request->session()->get('salary');
            $salary->fill($request->all());
            $request->session()->put('salary', $salary);
        }

        $data['request'] = $request->session()->get('salary');
        $data['positions'] = Position::where('status', $request->status)->get();
        $data['staff'] = Staff::all();
        return view('salary.detail.create', $data);
    }

    public function getSalary(Request $request)
    {
        $id = $request->staff_id;
        $position_id = Staff::where('id', $id)->first()->position_id;
        $shcedule_id = Schedule::where('staff_id', $id)->first()->id;
        $data['count_kehadiran'] = Absensi::where('schedule_id', $shcedule_id)
                                            ->where('attendance_id', 1)
                                            ->where('periode', ucwords($request->periode))->count();
        $data['get_position'] = Position::where('id', $position_id)->first();
        return response()->json($data);
    }

    public function storeDetail(Request $request)
    {   
        $salary = $request->session()->get('salary');
        $request->merge([
            'status' => $salary['status'],
            'periode' => $salary['periode'],
            ]);
        $request->validate([
            'periode'=>'required',
            'status'=>'required',
            'staff_id'=>'required',
            'tgl_salary'=>'required',
            'pot_bpjs'=>'nullable',
            'transportasi'=>'nullable',
            'total'=>'nullable',
        ]);

        $request->request->add(['tgl_salary'=>date('Y-m-d', strtotime($request->tgl_salary))]);

        if ($request->has('lembur')) {
            $request->merge([
                'jumlah_overtime' => $request->jam_lembur,
                'uang_overtime' => $request->gaji_lembur,
                ]);
        }

        $cek = Salary::where('staff_id', $request->staff_id)->where('periode', $request->periode)->first();
        if(empty($cek))
        {
            Salary::create($request->all());
            $message = [
                'alert-type'=>'success',
                'message'=> 'Data salary created successfully'
            ];  
        }
        else
        {
            $message = [
                'alert-type'=>'warning',
                'message'=> 'Penggajian staff '.$cek->staff->name.' pada periode '.$request->periode.' ini sudah di lakukan pembayaran.'
            ];  
        }

        return redirect()->route('salary.index')->with($message);

    }

    public function edit(Salary $salary)
    {
        $data['title'] = "Edit Salary";
        $data['staff'] = Staff::all();
        $data['salary'] = $salary;
        return view('salary.edit', $data);
    }

    public function update(Request $request, Salary $salary)
    {
        $staff_id_new = '|unique:tb_salary';
        if($salary->staff_id == $request->staff_id)
        {
            $staff_id_new = '';
        }

        $request->merge([
            'tgl_salary' => date('Y-m-d', strtotime($request->tgl_salary)),
            'salary' => preg_replace('/\D/', '', $request->salary),
            'uang_overtime' => preg_replace('/\D/', '', $request->uang_overtime),
            'pot_bpjs' => preg_replace('/\D/', '', $request->pot_bpjs),
        ]);

        $request->validate([
            'staff_id'=>'required'.$staff_id_new,
            'salary'=>'required|max:20',
            'uang_overtime'=>'required|max:20',
            'pot_bpjs'=>'nullable|max:13',
            'tgl_salary'=>'required',
        ]);

        $salary->update($request->all());

        $message = [
            'alert-type'=>'success',
            'message'=> 'Data salary updated successfully'
        ];  
        return redirect()->route('salary.index')->with($message);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        if($id)
        {   
            $salary = Salary::find($id);
            if($salary)
            {
                $salary->delete();
            }
            $count = Salary::count();
            $message = [
                'alert-type' => 'success',
                'count' => $count,
                'message' => 'Data salary deleted successfully.'
            ];
            return response()->json($message);
        }
    }

    public function show($id, Request $request)
    {
        // filter berdasarkan departement
        $f = $request->filter ?? null;

        $data['title'] = "Detail Penggajian";
        $data['staff'] = Staff::find($id);
        if($f == '' || $f == 'all')
        {
            $data['salary'] = Salary::where('staff_id', $id)->get();
        }
        else
        {
            $data['salary'] = Salary::where('staff_id', $id)
                                    ->where('periode', $f)
                                    ->get();
        }
        $data['periode'] = Salary::groupBy( 'periode' )
                ->orderBy( 'periode' )
                ->select(DB::raw('count(*) as count, periode'))
                ->get();
        $data['filter'] = $f;
        return view('salary.show', $data);      
    }

    public function excel($id, $filter)
    {
        // filter berdasarkan departement
        $f = $filter ?? 'all';
        $data['title'] = "Detail Penggajian";
        $data['staff'] = Staff::find($id);
        if($f == '' || $f == 'all')
        {
            $data['salary'] = Salary::where('staff_id', $id)->get();
        }
        else
        {
            $data['salary'] = Salary::where('staff_id', $id)
                                    ->where('periode', $f)
                                    ->get();
        }
        $data['periode'] = Salary::groupBy( 'periode' )
                ->orderBy( 'periode' )
                ->select(DB::raw('count(*) as count, periode'))
                ->get();
        $data['filter'] = $f;
        return view('salary.excel', $data);
    }

}
