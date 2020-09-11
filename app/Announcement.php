<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $guarded = [];

    public function getImageName()
    {
        return $this->belongsTo(User::class,'id', 'user_id');
    }
}
