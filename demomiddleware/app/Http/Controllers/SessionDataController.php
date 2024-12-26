<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionDataController extends Controller
{

    public function  DataStore(Request $request)
    {
        /// session data store
        $request->session()->put('user_email', 'hafiz@gmail.com');
        // echo "Data has been added to the session";
        return "Data has been added to the session";
    }

    public function DataGet(Request $request)
    {
        /// session data get
        $value = $request->session()->get('user_email', 'default');
        return $value;
    }


    public function DataFlush(Request $request)
    {
        /// session data delete
        $request->session()->flush();
        return "Data has been deleted from the session";
    }


}