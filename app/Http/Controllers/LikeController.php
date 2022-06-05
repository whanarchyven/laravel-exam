<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;


class LikeController extends Controller
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



    public function store()
    {
        $data=\request()->validate([
            'user_id'=>'',
            'post_id'=>'',
        ]);

//        dd($data['user_id']);

        if(Like::where([
            ['user_id', '=', $data['user_id']],
            ['post_id', '=', $data['post_id']],
        ])->first()===null){
            $like = Like::create($data);
            return redirect()->route('posts.show',$data['post_id']);
        }
        else{
            return redirect()->route('posts.show',$data['post_id']);
        }
    }

    public function destroy()
    {
        $data=\request()->validate([
            'user_id'=>'',
            'post_id'=>'',
        ]);
        $like=Like::where([
            ['user_id', '=', $data['user_id']],
            ['post_id', '=', $data['post_id']],
        ])->first();
        $like->delete();
        return redirect()->route('posts.show',$data['post_id']);
    }

}
