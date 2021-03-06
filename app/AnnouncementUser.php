<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnouncementUser extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function getSellerAnswers()
    {
        return $this->hasMany(Answer::class, 'user_id','user_id');
    }

    public function announcement()
    {
        return $this->hasOne(Announcement::class,'id','announcement_id');
    }
}
