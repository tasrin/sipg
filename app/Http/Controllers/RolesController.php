<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;

class RolesController extends Controller
{
    public function index()
    {
        $data['roles'] = Roles::all();
        $data['count'] = Roles::count();
        return view('roles.index', $data);
    }

    public function create()
    {
        $data['title'] = "Role Baru";
        return view('roles.create', $data);
    }
    
    public function store(Request $request)
    {   
        $request->validate([
            'name'=>'required|unique:roles',
            'display_name'=>'required',
        ]);

        Roles::create($request->all());

        $message = [
            'alert-type'=>'success',
            'message'=> 'Data roles created successfully'
        ];  
        return redirect()->route('roles.index')->with($message);
    }

    public function edit(Roles $roles)
    {
        $data['title'] = "Edit Role";
        $data['roles'] = $roles;
        return view('roles.edit', $data);
    }

    public function update(Request $request, Roles $roles)
    {
        $request->validate([
            'name'=>'required',
            'display_name'=>'required',
        ]);

        $roles->update($request->all());

        $message = [
            'alert-type'=>'success',
            'message'=> 'Data roles updated successfully'
        ];  
        return redirect()->route('roles.index')->with($message);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        if($id)
        {   
            $roles = roles::find($id);
            if($roles)
            {
                $roles->delete();
            }
            $count = roles::count();
            $message = [
                'alert-type' => 'success',
                'count' => $count,
                'message' => 'Data roles deleted successfully.'
            ];
            return response()->json($message);
        }
    }
}
