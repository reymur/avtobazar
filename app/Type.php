<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'title', 'parent_id',
    ];

    public function parent()
    {
        return $this->belongsTo(Car::class, 'parent_id', 'id');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class, 'model', 'title');
    }
}
