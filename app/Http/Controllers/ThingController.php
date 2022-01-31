<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Thing;
use App\Models\Usage;
use App\Models\User;
use Illuminate\Http\Request;

class ThingController extends Controller
{
    public function index()
    {
//        $category=Category::find(1);
//        dd($category->things);
//        $new=News::find(1);
//        dd($new->category);
//        $new=News::find(7);
//        dd($new->tags);
//        $tag=Tag::find(3);
//        dd($tag->news);
        $things = Thing::all();
        return view('thing.index', compact('things'));
    }

    public function create()
    {
        $places = Place::all();

        return view('thing.create', compact('places'));
    }

    public function store()
    {
        $data=\request()->validate([
            'name'=>'required|string',
            'description'=>'required|string',
            'wrnt'=>'',
            'master_id'=>'required',
            'place_id'=>'required',
        ]);
        $place_id=$data['place_id'];
        unset($data['place_id']);
        $user_id=auth()->user()->id;
        $thing = Thing::create($data);
        $usageData=[
            'user_id'=>$user_id,
            'thing_id'=>$thing->id,
            'place_id'=>$place_id,
        ];
        Usage::create($usageData);
        return redirect()->route('main');
    }

    public function show(Thing $thing)
    {
        $usage=Usage::where('thing_id',$thing->id)->first();
        $user=User::where('id',$usage->user_id)->first();
        $place=Place::where('id',$usage->place_id)->first();
        return view('thing.show', compact('thing','user','place'));
    }

    public function edit(Thing $thing)
    {
        //dd($thing->tags[1]->id);
        $places=Place::all();
        $place_id=Usage::where('thing_id',$thing->id)->first()->place_id;

        return view('thing.edit', compact('thing','place_id','places'));
    }

    public function update(Thing $thing)
    {
        $data=\request()->validate([
            'name'=>'required|string',
            'description'=>'required|string',
            'wrnt'=>'',
            'master_id'=>'required',
            'place_id'=>'required',
        ]);
        $place_id=$data['place_id'];
        unset($data['place_id']);

        $usageData=[
            'thing_id'=>$thing->id,
            'place_id'=>$place_id,
        ];
        $usage=Usage::where('thing_id',$usageData['thing_id'])->first();
        $usage->update($usageData);
        //update($usageData);
        $thing->update($data);
        return redirect()->route('things.show', $thing->id);
    }

    public function destroy(Thing $thing)
    {
        $thing->delete();
        return redirect()->route('main');
    }
}
