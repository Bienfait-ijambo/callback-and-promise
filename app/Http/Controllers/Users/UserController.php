<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\{User};
use DB;
class UserController extends Controller
{
    function index()
    {
    	// $data = User::all();

    	$data = DB::table('users')
    	->join('roles','users.id_role','=','roles.id')
    	->select('users.id as user_id','users.name','users.email','roles.role_name','users.password')
    	->get();

        return response()->json(['data' => $data]);

    }

    function store(Request $request)
    {
    	if ($request->id!="") 
    	{
    		# update
    		User::where('id',$request->id)
    		->update([
        		'name'            =>$request->name,
        		'email'           =>$request->email
        		
   			 ]);

             return response()->json(['data' => 'user created']);

    	}
    	else
    	{
    		User::create([
        		'name'            =>$request->name,
        		'email'           =>$request->email,
        		'password' 		  => Hash::make($request->password),
        		'remember_token'  => Hash::make(rand(0,10)),
        		'id_role'  		  => 3,

   			 ]);

             return response()->json(['data' => 'user updated']);

    	}
    }

    function changePassword(Request $request)
    {

    	User::where('id',$request->id)
    		->update([
        		'password' 		  => Hash::make($request->password),
        		'remember_token'  => Hash::make(rand(0,10)),
   			]);

        return response()->json(['data' => $data]);

    }
}
