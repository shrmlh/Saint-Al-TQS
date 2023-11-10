<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class RegistrarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function queue()
    {
        return view("admin.registrar.queue");
    }

    public function reports()
    {
        return view("admin.registrar.reports");
    }

    public function display()
    {
        return view("admin.registrar.display");
    }
    
    public function register()
    {
        return view("admin.registrar.register");
    }


    
    
}
