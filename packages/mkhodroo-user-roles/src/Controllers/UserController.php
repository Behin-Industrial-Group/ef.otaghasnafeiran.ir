<?php 

namespace Mkhodroo\UserRoles\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mkhodroo\UserRoles\Models\Access;
use Mkhodroo\UserRoles\Models\Role;

class UserController extends Controller
{
    function listForm() {
        return view('URPackageView::users.list');
    }

    function list() {
        return [
            'data' => User::get(),
        ];
    }

    public static function getAll() {
        return User::get();
    }


    function get(Request $r) {
        return view('URPackageView::users.edit')->with([
            'user' => collect(User::find($r->id)),
            'user_info' => collect(UserInfoController::getByUserId($r->id)),
        ]);
    }

    function edit(Request $r) {
        User::where('id', $r->id)->update($r->except('_token', 'updated_at', 'created_at'));
        return response(trans("Edited"));
    }
    

    function changeUserRole(Request $r) {
        User::where('id', $r->user_id)->update([
            'role_id' => $r->role_id
        ]);
        return response('ok');
    }

    public static function getByName($name){
        return User::where('name', $name)->first();
    }
}