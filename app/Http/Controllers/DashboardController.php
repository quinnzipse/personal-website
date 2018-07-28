<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function const(){

    }

    function calendar(){
        return view('developing');
    }
    function smartDash(){
        return view('developing');
    }
}
