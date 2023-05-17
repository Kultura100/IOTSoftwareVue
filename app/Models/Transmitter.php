<?php

namespace App\Models;

use App\Models\Read;
use App\Models\User;
use App\Models\Receiver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transmitter extends Model
{
    protected $guarded = [];
    protected $dates = ['updated_at'];
    protected $appends = ['Date'];
    use HasFactory;

    public function getReads(){
        return $this->hasMany(Read::class,'transmitter_id','id');
    }

    public function getReceiver(){
        return $this->hasOne(Receiver::class,'id','receiver_id');
    }

    public function getOwner(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function getDateAttribute()
    {
        return isset($this->updated_at) ? $this->updated_at->diffForHumans() : $this->updated_at;
    }
}
