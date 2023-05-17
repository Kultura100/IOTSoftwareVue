<?php

namespace App\Models;

use App\Models\Protocol;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Camera extends Model
{
    protected $guarded =[];
    use HasFactory;

    
    public function getProtocolName(){
        return $this->hasOne(Protocol::class,'id','protocol_id');
    }
}
