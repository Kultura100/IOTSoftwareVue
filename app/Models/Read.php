<?php

namespace App\Models;

use App\Models\Transmitter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Read extends Model
{
    protected $guarded = [];
    protected $dates = ['created_at'];
    protected $appends = ['Date'];
    use HasFactory;


    public function getDevice(){
        return $this->hasOne(Transmitter::class,'id','transmitter_id');
    }

    public function getDateAttribute()
    {
        return $this->created_at != null ? $this->created_at->diffForHumans() : $this->created_at;
    }
}
