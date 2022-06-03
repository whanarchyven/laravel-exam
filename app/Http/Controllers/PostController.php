<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        return view('post.show', compact('post'));
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
