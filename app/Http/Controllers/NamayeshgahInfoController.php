<?php

namespace App\Http\Controllers;

use App\Models\Namayeshgah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mkhodroo\Cities\Controllers\CityController;

class NamayeshgahInfoController extends Controller
{
    public function listForm(){
        return view('dashboard.namayeshgah-info.list');
    }

    public function list(){
        return [
            'data' => Namayeshgah::get()->each(function($row){
                $row->user = User::find($row->user_id);
                $row->user->province = CityController::getById($row->user->city_id)?->province;
            })
        ];
    }

    public function NumberOfNamayeshgahPerProvince(){
        $data = Namayeshgah::join('users', 'namayeshgah.user_id', '=', 'users.id')
        ->join('cities', 'users.city_id', '=', 'cities.id')
        ->select(DB::raw('* , count(*) as count'))
        ->groupBy('cities.province')
        ->get();
        return $data->whereNotNull('start_date');
        return $data;
        return [
            'labels' => ''
        ];
    }

    public function editForm($id, NamayeshgahController $nc){
        $data = $nc->getById($id);
        return view('dashboard.namayeshgah-info.edit')->with([
            'data' => $data
        ]);
    }

    public function summary(NamayeshgahController $nc){
        $all = $nc->getAll();
        return [
            'all' => $all->count(),
            'info' => $all->whereNotNull('start_date')->count(),
            // 'data' => $this->NumberOfNamayeshgahPerProvince()
        ];
    }
}
