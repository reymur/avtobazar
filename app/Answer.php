<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['announcement_id','user_id','which','price'];

    public function announcement()
    {
        return $this->belongsToMany(Announcement::class,'id','announcement_id');
    }

    public function answerAnnounce()
    {
        return $this->hasMany(Announcement::class,'id','announcement_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}

