<?php

namespace App\Models;

use App\Models\Transmitter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receiver extends Model
{
    protected $guarded =[];
    use HasFactory;

    public function getTransmitters(){
        return $this->hasMany(Transmitter::class,'receiver_id','id');
    }

    public function ParseSignal($signal){
        if($signal < -70)
        return 1;
        elseif($signal > -70 && $signal < -60)
        return 2;
        elseif($signal > -60 && $signal < -50)
        return 3;
        elseif($signal > -50)
        return 4;
    }
}
