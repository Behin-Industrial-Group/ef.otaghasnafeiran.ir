<?php

namespace Mkhodroo\EventManager\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mkhodroo\Cities\Models\City;
use Mkhodroo\EventManager\Models\Event;

class ViewController extends Controller
{
    public function addEventForm(){
        return view('EMView::event.add');
    }
}
