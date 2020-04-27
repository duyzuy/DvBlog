<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class MediaController extends Controller
{
    //

    public function index(){
        // $files = Storage::allFiles('public');
        // $directories = Storage::allDirectories('public');
        return view('manage.media.index');
    }
}
