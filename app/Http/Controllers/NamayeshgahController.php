<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NamayeshgahController extends Controller
{
    public function addForm(){
        return view('dashboard.namayeshgah.add');
    }
}
