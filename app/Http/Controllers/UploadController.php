<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class UploadController extends Controller
{
    public static function inPublicFolder($file, $dir="")
    {
        $name = Str::random() . '.' . $file->getClientOriginalExtension();
        

        $a = Storage::disk('public')->put("", $file);
        $return_path = config('filesystems.disks.public.url'). "/$a";
        return $return_path;
    }
}
