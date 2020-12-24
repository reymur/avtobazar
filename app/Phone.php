<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = ['user_id','sale_id','number'];

    public function phoneable(){
        return $this->morphTo();
    }
}
