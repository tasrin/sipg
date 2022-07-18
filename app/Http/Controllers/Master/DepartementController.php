<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Departement;

class DepartementController extends Controller
{
    public function __invoke(Request $request)
    {
        //
    }

    public function index()
    {
        $data['departement'] = Departement::all();
        $data['count'] = Departement::count();
        return view('master.departement.index', $data);
    }   

    public function create()
    {
        return view('master.departement.create', ['title'=>'Tambah Departement']);
    }

    public function store(Request $request)
    {   
        $request->merge([
            'salary' => preg_replace('/\D/', '', $request->salary),
        ]);

        $request->validate([
            'name'=>'required|max:100',
        ]);

        Departement::create($request->all());

        $message = [
            'alert-type'=>'success',
            'message'=> 'Data departement created successfully'
        ];  
        return redirect()->route('master.departement.index')->with($message);
    }

    public function edit(Departement $departement)
    {
        $data['title'] = 'Edit Departement';
        $data['departement'] = $departement;
        return view('master.departement.edit', $data);       
    }

    public function update(Request $request, Departement $departement)
    {
        $request->merge([
            'salary' => preg_replace('/\D/', '', $request->salary),
        ]);

        $request->validate([
            'name'=>'required|max:100',
        ]);

        $departement->update($request->all());

        $message = [
            'alert-type'=>'success',
            'message'=> 'Data departement updated successfully'
        ];  
        return redirect()->route('master.departement.index')->with($message);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        if($id)
        {   
            $departement = Departement::find($id);
            if($departement)
            {
                $departement->delete();
            }
            $count = Departement::count();
            $message = [
                'alert-type' => 'success',
                'count' => $count,
                'message' => 'Data departement deleted successfully.'
            ];
            return response()->json($message);
        }
    }
}
