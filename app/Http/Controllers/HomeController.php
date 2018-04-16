<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the User dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if (Auth::check() && Auth::user()->admin) {
            $user = User::find($request->id);
        } else
        $user = Auth::user();
        return view('home', ['user' => $user]);
    }

    /**
     * Update User data/info.
     *
     * @return Previous Page/view
     */
    public function update(Request $request) {  
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$request->id,
            'name' => 'required',
            'phone' => 'nullable|numeric|min:10',
        ]);
        $user = User::find($request->id);
        
        if($request->hasFile('avatar')){ // Handle the user upload of avatar
            $avatar = $request->file('avatar');
            $avatar_name = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(200, 200)->save( public_path('/uploads/avatars/' . $avatar_name ) );
        } else
        $avatar_name = $user->avatar;
        
        $user->company = $request->company;
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->avatar = $avatar_name;
        $user->save();
        return Redirect()->back()->with('status', 'Profile data for '.$request->name. ' ' .$request->surname. ' updated successfuly!');
    }
}
