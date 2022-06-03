<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Post;
use App\Models\Thing;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $posts=Post::all();
        return view('main',compact('posts'));
    }
}
