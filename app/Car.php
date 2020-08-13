<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['title', 'name', 'image'];

    public function types()
    {
        return $this->hasMany(Type::class, 'parent_id', 'id');
    }
}
