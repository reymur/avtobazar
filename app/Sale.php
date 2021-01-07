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

    public function phones(){
        return $this->morphMany(Phone::class, 'phoneable');
    }

    public function image(){
        return $this->hasOne(SaleImage::class, 'sale_id', 'id');
    }

    public function images(){
        return $this->hasMany(SaleImage::class, 'sale_id', 'id');
    }
}
