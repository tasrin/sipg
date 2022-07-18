<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\Users;
use App\Models\Master\Staff;
use Auth;
use Storage;

class UsersController extends Controller
{
    public function index()
    {
        $data['users'] = Users::all();
        $data['count'] = Users::count();
        return view('users.index', $data);
    }

    public function update(Request $request, $id)
    {
        $users = Users::find($id);
        if ($request->has('reset')) {
            $users->update([
                'password' => bcrypt($users->username)
            ]);
        }

        $message = [
            'alert-type' => 'success',
            'message' => 'Password berhasil di-reset.'
        ];
        return redirect()->back()->with($message);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $users = Users::where('id', $id);
        if($users)
        {
            $staff = Staff::where('users_id', $id)->first();
            $staff->update(['users_id'=>null]);
            $users->delete();
        }
    }

    public function editAccount($id)
    {
        $data['title'] = "Edit Account";
        $data['users'] = Users::find($id);
        return view('users.account', $data);

    }

    public function updateAccount(Request $request, $id)
    {
        $username 		= $request->username;
        $username_old	= $request->username_old;

        $callback			= '';
        if($username !== $username_old){
            $callback = "|unique:users";
        }

        $request->validate([
            'username' => 'required|string|max:35|min:5'.$callback,
            'password' => 'nullable'
        ]);

        if( ! empty($request->password_new)){
            $request->request->add(['password' => bcrypt($request->password_new)]);
        }
        $users = Users::where('id', $id)->first();
        $users->update($request->all());
        
        $message = [
            'alert-type' => 'success',
            'message' => 'Account anda berhasil di-update.'
        ];
        return redirect()->route('profile')->with($message);
    }
}
