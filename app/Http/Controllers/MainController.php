<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Thing;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $things=Thing::all();
        $places=Place::all();
        return view('main',compact('things','places'));
    }
}
