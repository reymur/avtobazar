<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerType extends Model
{
    protected $fillable = ['title', 'user_id'];

    public function model()
    {
        return $this->belongsTo(Car::class, 'title', 'name');
    }
}
