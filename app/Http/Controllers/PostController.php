<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
//        $category=Category::find(1);
//        dd($category->posts);
//        $new=News::find(1);
//        dd($new->category);
//        $new=News::find(7);
//        dd($new->tags);
//        $tag=Tag::find(3);
//        dd($tag->news);
        $posts = Post ::all();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $posts = Post::all();
        return view('post.create', compact('posts'));
    }

    public function store()
    {
        $data=\request()->validate([
            'title'=>'required|string',
            'short_desc'=>'required|string',
            'desc'=>'required|string',
            'image'=>'',
        ]);


        $post = Post::create($data);
        return redirect()->route('main');
    }

    public function show(Post $post)
    {
        $is_liked=0;
        $views=0;
        if(View::where([
                ['user_id', '=', auth()->user()->id],
                ['post_id', '=', $post->id],
            ])->first()===null){
            return redirect(route('view',$post->id));
        }
        $views=sizeof(View::where('post_id', '=', $post->id)->get());
        $likes_count=sizeof(Like::where('post_id', '=', $post->id)->get());
        if(Like::where([
                ['user_id', '=', auth()->user()->id],
                ['post_id', '=', $post->id],
            ])->first()===null){
            $is_liked=0;
        }
        else{
            $is_liked=1;
        }
        return view('post.show', compact('post','is_liked','likes_count','views'));
    }

    public function edit(Post $post)
    {
        //dd($post->tags[1]->id);
        return view('post.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $data=\request()->validate([
            'title'=>'required|string',
            'short_desc'=>'required|string',
            'desc'=>'required|string',
            'image'=>'',
        ]);
        $post->update($data);
        return redirect()->route('posts.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('main');
    }

    public function about(){
        return view('about');
    }
    public function feedback(){
        return view('feedback');
    }
}
