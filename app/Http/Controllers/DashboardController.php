<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function user(){
        return view('dashboards.user');
    }

    public function admin(){
        return view('dashboards.admin');
    }
}
