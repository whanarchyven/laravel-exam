<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    use HasFactory;
    protected $table='things';
    protected $guarded=[];

    public function master(){
        return $this->belongsTo(User::class,'master_id','id');
    }
}
