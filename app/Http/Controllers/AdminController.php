<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
    	$users = DB::select('select * from users where admin = ?', [0]);
        return view('admin', ['name' => Auth::user()->name, 'users' => $users]);
    }

    public function post(Request $request)
    {
        if (Auth::check() && Auth::user()->admin) {
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$request->id,
            'name' => 'required',
            'phone' => 'nullable|numeric|min:10',
        ]);

        $user = User::find($request->id);
        $user->company = $request->company;
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin')->with('status', 'Profile data for '.$request->name. ' ' .$request->surname. ' updated successfuly!');//redirect to Admin dashboard after update with status

        } else
        return Redirect()->back('home'); //not allowed to transact      
    }

    public function user_view(Request $request) {

        if (Auth::check() && Auth::user()->admin) {
            $user = User::find($request->id);
            return view('home', ['user' => $user]);
        } else
        return Redirect()->back('home');

    }

    public function delete(Request $request) {

        if (Auth::check() && Auth::user()->admin) {
            User::destroy($request->id);
            return Redirect()->back()->with('status', 'User account deleted successfuly!');
        } else
        return Redirect()->back('home');
    }

}
