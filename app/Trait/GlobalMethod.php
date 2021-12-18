<?php

namespace App\Traits;
use DB;


trait GlobalMethod{

	//global query
    function Gquery($request)
    {
      return str_replace(" ", "%", $request->get('query'));
      // return $request->get('query');
    }

    function apiData($data)
    {
      return response($data, 200);
    }


    function msgJson($message) 
    {
        return response()->json(['data' => $message]);
    }

    function msgError($message)
    {
      return response()->json(['error'  => $message]);
    }


}