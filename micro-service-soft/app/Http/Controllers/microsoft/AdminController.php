<?php

namespace App\Http\Controllers\microsoft;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{ 
    public function dash()
    {
        return view('admin.dashboard');
    }
}
