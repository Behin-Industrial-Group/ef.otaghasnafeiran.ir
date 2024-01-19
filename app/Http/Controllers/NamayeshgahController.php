<?php

namespace App\Http\Controllers;

use App\Models\Namayeshgah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NamayeshgahController extends Controller
{
    public function getMine(){
        return Namayeshgah::where('user_id', Auth::id())->select('id','start_date', 'end_date')->get();
    }
    public function addForm(){
        return view('dashboard.namayeshgah.add');
    }

    public function add(Request $r){
        $data = $r->all();
        $data['user_id'] = Auth::id();
        $data['price_file'] = $r->file('price_file') ? UploadController::inPublicFolder($r->file('price_file')) : '';
        $data['place_checklist_file'] = $r->file('place_checklist_file') ? UploadController::inPublicFolder($r->file('price_file')) : '';
        $data['booth_checklist_file'] = $r->file('booth_checklist_file') ? UploadController::inPublicFolder($r->file('price_file')) : '';
        $data['performance_checklist_file'] = $r->file('performance_checklist_file') ? UploadController::inPublicFolder($r->file('price_file')) : '';

        $n = Namayeshgah::create($data);
        return $n;
    }

    public function editForm($id){
        return view('dashboard.namayeshgah.add');
    }
}
