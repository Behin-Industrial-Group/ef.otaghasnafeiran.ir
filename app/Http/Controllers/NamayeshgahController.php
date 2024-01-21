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

    public function getById($id){
        return Namayeshgah::find($id);
    }

    public function addForm(){
        $id = Namayeshgah::create([
            'user_id' => Auth::id()
        ])->id;
        return $this->editForm($id);
        return view('dashboard.namayeshgah.add');
    }

    public function add(Request $r){
        $data = $r->all();
        $data['user_id'] = Auth::id();
        $data['price_file'] = $r->file('price_file') ? UploadController::inPublicFolder($r->file('price_file')) : null;
        $data['place_checklist_file'] = $r->file('place_checklist_file') ? UploadController::inPublicFolder($r->file('place_checklist_file')) : null;
        $data['booth_checklist_file'] = $r->file('booth_checklist_file') ? UploadController::inPublicFolder($r->file('booth_checklist_file')) : null;
        $data['performance_checklist_file'] = $r->file('performance_checklist_file') ? UploadController::inPublicFolder($r->file('performance_checklist_file')) : null;

        if(isset($r->id)){
            Namayeshgah::where('id', $r->id)->update($data);
            return $r->id;
        }else{
            return Namayeshgah::create($data)->id;
        }
    }

    public function editForm($id){
        return view('dashboard.namayeshgah.add')->with([
            'id' => $id,
            'data' => $this->getById($id),
        ]);
    }

    public function deleteFile(Request $r){
        $row =Namayeshgah::where('id', $r->id)->where('user_id', Auth::id())->first();
        if($row){
            $column_name = $r->column_name;
            $row->$column_name = null;
            $row->save();
            return response(trans("file deleted."));
        }
        return response(trans("file can not delete."), 402);
    }

    public function modal(Request $r){
        return view("dashboard.namayeshgah.$r->view")->with([
            'id' => $r->id,
            'data' => $this->getById($r->id),
        ]);
    }
}
