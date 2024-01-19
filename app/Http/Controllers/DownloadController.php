<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public static function fromPublicFolder($name){
        $path = public_path("$name");
        return response()->download($path, $name);
    }
}
