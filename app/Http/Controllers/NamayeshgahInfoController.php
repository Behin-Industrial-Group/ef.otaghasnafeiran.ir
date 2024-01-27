<?php

namespace App\Http\Controllers;

use App\Models\Namayeshgah;
use App\Models\User;
use Illuminate\Http\Request;

class NamayeshgahInfoController extends Controller
{
    public function listForm(){
        return view('dashboard.namayeshgah-info.list');
    }

    public function list(){
        return [
            'data' => Namayeshgah::get()->each(function($row){
                $row->user = User::find($row->user_id);
            })
        ];
    }

    public function editForm($id, NamayeshgahController $nc){
        $data = $nc->getById($id);
        return view('dashboard.namayeshgah-info.edit')->with([
            'data' => collect($data)
        ]);
    }
}
