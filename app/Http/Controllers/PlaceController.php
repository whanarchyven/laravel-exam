<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
//        $category=Category::find(1);
//        dd($category->places);
//        $new=News::find(1);
//        dd($new->category);
//        $new=News::find(7);
//        dd($new->tags);
//        $tag=Tag::find(3);
//        dd($tag->news);
        $places = Place ::all();
        return view('place.index', compact('places'));
    }

    public function create()
    {
        $places = Place::all();

        return view('place.create', compact('places'));
    }

    public function store()
    {
        $data=\request()->validate([
            'name'=>'required|string',
            'description'=>'required|string',
            'is_repair'=>'',
            'is_working'=>'',
        ]);


        $place = Place ::create($data);
        return redirect()->route('main');
    }

    public function show(Place $place)
    {
        return view('place.show', compact('place'));
    }

    public function edit(Place $place)
    {
        //dd($place->tags[1]->id);
        return view('place.edit', compact('place'));
    }

    public function update(Place $place)
    {
        $data=\request()->validate([
            'name'=>'required|string',
            'description'=>'required|string',
            'is_repair'=>'',
            'is_working'=>'',
        ]);
        $place->update($data);
        return redirect()->route('places.show', $place->id);
    }

    public function destroy(Place $place)
    {
        $place->delete();
        return redirect()->route('main');
    }
}
