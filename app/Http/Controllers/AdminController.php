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

    public function update(Request $request)
    {	
    	$user = User::find($request->id);
    	$user->company = $request->company;
		$user->name = $request->name;
		$user->surname = $request->surname;
		$user->phone = $request->phone;
		$user->email = $request->email;
		$user->avatar = $request->avatar;
		$user->save();
    }
}
