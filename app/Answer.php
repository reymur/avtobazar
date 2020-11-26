<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Answer extends Model
{
    protected $fillable = ['announcement_id','user_id','which','price','seen','condition','image'];

    public function getCreatedAtAttribute(){
        return Carbon::parse($this->attributes['created_at'])->format('d/m/Y | H:i');
    }

    public function announcement()
    {
        return $this->belongsTo(Announcement::class,'announcement_id','id')
            ->where('user_id', Auth::user()->id);
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

