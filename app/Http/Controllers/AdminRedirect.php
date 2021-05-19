<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminRedirect extends Controller
{
    //
    public function __contruct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.index');
    }
}
