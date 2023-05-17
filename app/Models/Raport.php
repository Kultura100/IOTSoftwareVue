<?php

namespace App\Models;

use App\Models\Read;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Raport extends Model
{
    use HasFactory;

    protected $guarded =[];
    protected $appends = ['Date'];
    public function getRead(){
        return $this->hasOne(Read::class,'id','read_id');
    }

    public function getDateAttribute()
    {
        return isset($this->updated_at) ? $this->updated_at->diffForHumans() : $this->updated_at;
    }
}
