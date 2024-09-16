<?php

namespace Mkhodroo\EventManager\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mkhodroo\Cities\Models\City;
use Mkhodroo\EventManager\Models\Event;

class EventController extends Controller
{
    public function add(Request $r){
        return Event::create($r->all());
    }

    public function get($id) {
        return Event::find($id);
    }

    function edit() {
        
    }
}
