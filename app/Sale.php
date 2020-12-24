<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'user_id','marka','model','title','condition',
        'price','city','note','name','phone','pin','number'
    ];

    public function phone(){
        return $this->morphOne(Phone::class, 'phoneable');
    }
}
