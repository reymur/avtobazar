<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sale;

class Phone extends Model
{
    protected $fillable = ['user_id','sale_id','number'];

    public function phoneable(){
        return $this->morphTo();
    }

    public function sales(){
        return $this->morphedByMany(Sale::class,'phoneable');
    }
}
