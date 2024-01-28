<?php

namespace Mkhodroo\UserRoles\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public static function getByUserId($user_id){
        return UserInfo::where('user_id', $user_id)->first();
    }

    function edit(Request $r) {
        UserInfo::where('id', $r->id)->update($r->except('_token', 'updated_at', 'created_at'));
        return response(trans("Edited"));
    }
}
