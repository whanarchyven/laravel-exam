<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Thing;
use App\Models\Usage;
use App\Models\User;
use Illuminate\Http\Request;

class MyThingController extends Controller
{
    public function index(){
        $my_user_id=auth()->user()->id;
        $my_permissions=Usage::where('user_id',$my_user_id)->get();
        $my_things=[

        ];
        foreach ($my_permissions as $permission){
            array_push($my_things,Thing::where('id',$permission->thing_id)->first());
        }

        return view('mythings',compact('my_things'));
    }
    public function show(Thing $thing){
        return view('thing.my_show',compact('thing'));
    }
    public function edit(Thing $thing){
        $users=User::all();
        return view('thing.my_edit',compact('users','thing'));
    }
    public function update(Thing $thing){
        $data=\request()->validate([
            'user_id'=>'required',
        ]);
        $usagePlace=Usage::where('thing_id',$thing->id)->first();
//        dd($usagePlace);
        $usageData=[
            'user_id'=>$data['user_id'],
            'thing_id'=>$thing->id,
            'place_id'=>$usagePlace->place_id,
        ];
//        dd($usageData);

        $usagePlace->update($usageData);
        return redirect()->route('mythings');

    }
}
