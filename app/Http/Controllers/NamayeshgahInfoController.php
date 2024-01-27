<?php

namespace App\Http\Controllers;

use App\Models\Namayeshgah;
use Illuminate\Http\Request;

class NamayeshgahInfoController extends Controller
{
    public function listForm(){
        return view('dashboard.namayeshgah-info.list');
    }

    public function list(){
        return [
            'data' => Namayeshgah::get()
        ];
    }

    public function editForm($id, NamayeshgahController $nc){
        $data = $nc->getById($id);
        return view('dashboard.namayeshgah-info.edit')->with([
            'data' => collect($data)
        ]);
    }
}
