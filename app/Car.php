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

    public function sales()
    {
        return $this->hasMany(Sale::class, 'marka','name');
    }
}
