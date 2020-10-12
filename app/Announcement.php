<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Announcement extends Model
{
    protected $guarded = [];

    public function getImageName()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function getByPin($num)
    {
        return $this->hasOne(self::class, 'pin', 'pin')
            ->where('store', $num);
    }

    public function whos()
    {
        return $this->hasMany(Who::class, 'id', 'store');
    }

    public function getSeller()
    {
        return $this->belongsTo(User::class, 'name', 'name')
            ->where('status', 2);
    }

    public function getAllSellers()
    {
        return $this->hasMany(self::class, 'pin', 'pin');
    }

    public function getImageByName()
    {
        return $this->hasMany(User::class, 'name', 'name');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'announcement_users', 'announcement_id', 'user_id');
    }

    public function getSellers()
    {
        return $this->belongsToMany(self::class, 'announcement_users', 'announcement_id', 'user_id');
    }

    public function getSellerAnswers()
    {
        return $this->hasOne(Answer::class, 'announcement_id', 'id')
            ->where('user_id', Auth::user()->id);
    }

    public function getSender()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getFuelType()
    {
        return $this->hasOne(FuelType::class, 'id', 'fuel_type');
    }

    public function getCondition()
    {
        return $this->hasOne(Condition::class, 'id', 'condition');
    }

    public function getAnswerUsers()
    {
        return $this->hasMany(Answer::class, 'announcement_id', 'id');
    }
}
