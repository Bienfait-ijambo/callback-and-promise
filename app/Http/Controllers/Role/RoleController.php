<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modals\Role\{Role};
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::all();
        return response()->json(['data' => $data]);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->id!="") 
        {
            Role::where('id',$request->id)
            ->update( [
                'role_name' => $request->role_name
            ]);

            return response()->json(['data' => "role updated !"]);

        }
        else
        {

        Role::create([
        'role_name' => $request->role_name
        ]);
        return response()->json(['data' => "role created !"]);

        }
        

    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Role::where('id',$id)->get();
        return response()->json(['data' => $data]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::where('id',$id)->delete();
        return response()->json(['data' => "role deleted!"]);
    }
}
