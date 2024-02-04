<?php

namespace App\Http\Controllers;

use App\Models\Namayeshgah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mkhodroo\Cities\Controllers\CityController;

class NamayeshgahController extends Controller
{
    public function getMine(){
        return Namayeshgah::where('user_id', Auth::id())->select('id','start_date', 'end_date')->get();
    }

    public function getById($id){
        $data = Namayeshgah::find($id);
        $city = CityController::getById($data->city_id);
        $data->city = $city?->province . ' ' . $city?->city;
        return $data;
    }

    public function getAll(){
        return Namayeshgah::get();
    }

    public function addForm(){
        $id = Namayeshgah::create([
            'user_id' => Auth::id()
        ])->id;
        return $this->editForm($id);
        return view('dashboard.namayeshgah.add');
    }

    public function add(Request $r){
        $r->validate([
            'pr_mobile' => 'digits:11',
            'pr_phone' => 'digits:11',
            'excutive_director_mobile' => 'digits:11',
            'performancer_nid' => 'digits_between:10,11',
            'performancer_mobile' => 'digits:11',
            'number_of_booth1' => 'numeric',
            'meterage_of_booth1' => 'numeric',
            'price_of_booth1_per_meter' => 'numeric',
            'number_of_booth2' => 'numeric',
            'meterage_of_booth2' => 'numeric',
            'price_of_booth2_per_meter' => 'numeric',
            'number_of_booth3' => 'numeric',
            'meterage_of_booth3' => 'numeric',
            'price_of_booth3_per_meter' => 'numeric',
            'number_of_booth4' => 'numeric',
            'meterage_of_booth4' => 'numeric',
            'price_of_booth4_per_meter' => 'numeric',
            'price_file' => 'extensions:xlsx',
            'place_checklist_file' => 'extensions:pdf,xlsx',
            'booth_checklist_file' => 'extensions:pdf,xlsx',
            'performance_checklist_file' => 'extensions:pdf,xlsx'
        ]);
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

    public function delete(Request $r){
        $row =Namayeshgah::where('id', $r->id)->where('user_id', Auth::id())->first();
        if($row){
            $row->delete();
            return response(trans("namayeshgah deleted"));
        }
        return response(trans("namayeshgah can not delete"), 402);
    }

    public function deleteForAdmin(Request $r){
        $row =Namayeshgah::where('id', $r->id)->first();
        foreach(collect($row) as $key => $value){
            if($value && !in_array($key, ['id', 'user_id', 'created_at', 'updated_at'])){
                return response(trans("This Record Has Data"), 402);
            }
        }
        if($row){
            $row->delete();
            return response(trans("namayeshgah deleted"));
        }
        return response(trans("namayeshgah can not delete"), 402);
    }

    public function modal(Request $r){
        return view("dashboard.namayeshgah.$r->view")->with([
            'id' => $r->id,
            'data' => $this->getById($r->id),
        ]);
    }
}
