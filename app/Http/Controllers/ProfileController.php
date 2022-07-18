<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master\Staff;
use App\Models\Master\Position;
use App\Models\Master\Departement;
use App\Models\Roles;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $data['staff'] = Staff::findOrFail(Auth::user()->staff->id ?? '');
        return view('profile.index', $data);
    }

    public function updateFoto()
    {
        $data['title'] = "Upload Foto Profile";
        return view('employee._update_foto', $data);
    }

    public function uploadPhoto(Request $request)
    {
        // dd($request->all());
        $staff = Staff::findOrFail(Auth::user()->staff->id);
        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
            $picture = $request->picture;
            $path = "img/uploads/profile/";
            $ext = $picture->getClientOriginalExtension();
            $hash = md5($picture->getRealPath());
            $picture->move(public_path($path), $hash.'.'.$ext);
            if ($staff->photo) {
                unlink(public_path($staff->photo));
            }
           
            $staff->update([
                'photo' => 'img/uploads/profile/'.$hash.'.'.$ext
            ]);
        }
        $message = [
            'alert-type' => 'success',
            'message' => 'Perubahan disimpan.'
        ];
        return redirect()->route('profile')->with($message);
    }

    public function editProfile($id)
    {
        if ($id == Auth::user()->staff->id) {
            $data['title']    = "Edit Profile";
            $data['staff'] = Staff::find($id);
            $data['position'] = Position::all();
            $data['departement'] = Departement::all();
            $data['roles'] = Roles::where('name', '!=', 'superadmin')->get();
            return view('profile.edit', $data);
        }
        else {
            return abort(404);
        }
    }


    public function updateProfile(Request $request, $id)
    {
        $staff = Staff::find($id);
        $request->validate([
            'name'=>'required|max:100',
            'birth'=>'required|date',
            'startdate'=>'required|date',
            'phone'=>'required|max:13',
            'position_id'=>'required',
            'departement_id'=>'required',
            'addres'=>'required',
        ]);
        $staff->update($request->all());
        $message = [
            'alert-type' => 'success',
            'message' => 'Profile updated successfully.'
        ];
        return redirect()->route('profile')->with($message);
    }
}
