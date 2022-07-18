<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Staff;
use App\Models\Master\Position;
use App\Models\Master\Departement;
use App\Models\Roles;
use App\Models\Users;

class StaffController extends Controller
{
    public function index()
    {
        $data['staff'] = Staff::all();
        $data['count'] = Staff::count();
        return view('master.staff.index', $data);
    }

    public function create()
    {
        $data['title'] = "Tambah Staff";
        $data['position'] = Position::all();
        $data['roles'] = Roles::all();
        $data['departement'] = Departement::all();
        return view('master.staff.create', $data);
    }

    public function store(Request $request)
    {   
        // dd($request->all());
        $request->validate([
            'name'=>'required|max:100',
            'birth'=>'required|date',
            'startdate'=>'required|date',
            'phone'=>'required|max:13',
            'position_id'=>'required',
            'departement_id'=>'required',
            'addres'=>'required',
        ]);

        if ($request->has('makeUserAccount')) {
            $msg = [
                'username.min' => 'Username harus terdiri dari minimal 6 karakter.',
                'username.unique' => 'Username sudah digunakan.'
            ];
            $request->validate([
                'username' => 'required|string|min:6|max:255|unique:users',
                'role_id' => 'required|integer',
            ], $msg);

            $user = Users::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->username),
                'role_id' => $request->role_id
            ]);
            $request->request->add(['users_id' => $user->id]);
        }

        Staff::create($request->all());

        $message = [
            'alert-type'=>'success',
            'message'=> 'Data staff created successfully'
        ];  
        return redirect()->route('master.staff.index')->with($message);
    }

    public function edit(Staff $staff)
    {
        $data['title'] = 'Edit Staff';
        $data['staff'] = $staff;
        $data['position'] = Position::all();
        $data['departement'] = Departement::all();
        $data['roles'] = Roles::all();
        return view('master.staff.edit', $data);       
    }

    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'name'=>'required|max:100',
            'birth'=>'required|date',
            'startdate'=>'required|date',
            'phone'=>'required|max:13',
            'position_id'=>'required',
            'departement_id'=>'required',
            'addres'=>'required',
        ]);

        if ($request->has('makeUserAccount')) {
            $msg = [
                'username.min' => 'Username harus terdiri dari minimal 6 karakter.',
                'username.unique' => 'Username sudah digunakan.'
            ];
            $request->validate([
                'username' => 'required|string|min:6|max:255|unique:users',
                'role_id' => 'required|integer',
            ], $msg);

            $user = Users::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->username),
                'role_id' => $request->role_id
            ]);
            $request->request->add(['users_id' => $user->id]);
        }

        $staff->update($request->all());

        $message = [
            'alert-type'=>'success',
            'message'=> 'Data staff updated successfully'
        ];  
        return redirect()->route('master.staff.index')->with($message);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        if($id)
        {   
            $staff = Staff::find($id);
            if($staff)
            {
                $staff->delete();
            }
            $count = Staff::count();
            $message = [
                'alert-type' => 'success',
                'count' => $count,
                'message' => 'Data staff deleted successfully.'
            ];
            return response()->json($message);
        }
    }
}
