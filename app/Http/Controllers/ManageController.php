<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use User;

class ManageController extends Controller
{
    //
    public function __construct(){
        Auth::guard('web');
    }
    public function index(){
        return view('manage.dashboard');
    }

    public function dashboard()
    {
        return view('manage.dashboard');
    }

}