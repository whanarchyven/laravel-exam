<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\View;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $data=\request()->validate([
            'user_id'=>'',
            'post_id'=>'',

        ]);
        dd($data);
//        $post = Post::create($data);
//        return redirect()->route('main');
    }



    public function store($post_id)
    {
        $data=[
            'user_id'=>auth()->user()->id,
            'post_id'=>$post_id,
        ];
        View::create($data);
        return redirect(route('posts.show',$data['post_id']));
    }
}
