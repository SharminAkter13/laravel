<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
     
    {
        $user = User::all();
        return view('pages.user.users',compact('user'));
    }
    
       public function create()
    {
        return view('pages.user.create_user');
    }

    public function store(Request $request)
    {

        user::create($request->only([
            'name',
            'email',
            'password',
        ]));
        // dd($request->all());


        return Redirect::to('/user');
    }

    
    public function destroy(Request $request)
    {
        $uid = user::find($request->user_id);
        $uid->delete();
        return Redirect::to('/user');
}


 public function update($user_id)
    {
        $u = User::find($user_id);
        return view('pages.user.edit_user',compact('u'));
    }

    public function editStore(Request $request)
    {
       $u = User::find($request->user_id);
        $u->name = $request->name;
        $u->email = $request->email;
        $u->password = $request->password;
        $u->save();
        return Redirect::to('/user');
    }

}
