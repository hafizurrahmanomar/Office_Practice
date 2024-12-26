<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    function publicMessage(Request $request){
        return Response()->json([
            "message" => "This is a public message"
        ]);
    }

    function privateMessage(Request $request){

        return Response()->json([
            "message" => "This is private message"
        ]);
    }

    public function restrictedMessage(){
        return Response()->json([
            "message" => "This is a restricted message"
        ]);
    }

public function downloadFile(){
    return Response()->json([
        "message" => "File download successful"
    ]);
}



public function pictureDownload(){
    return Response()->json([
        "message" => "Picture download successful"
    ]);
}


    public function Hafiz(Request $request)
    {
        return Response()->json([
            "message" => "Hafiz is a good boy"
        ]);
    }

 public function country(Request $request)
    {
        return Response()->json([
            "message" => "Country is Bangladesh"
        ]);
    }













}