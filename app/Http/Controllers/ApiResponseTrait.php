<?php
namespace App\Http\Controllers;

trait ApiResponseTrait {
    public  function success($data,$message,$status=200)
    {
        return response()->json([
            "status"=>$status,
            "message"=>$message,
            "data"=>$data,
        ]);
    }

    public  function error($resource,$message,$status=404)
    {
        return response()->json([
            "status"=>$status,
            "message"=>$message,
        ]);
    }

}
