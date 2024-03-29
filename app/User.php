<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable/* implements MustVerifyEmail*/
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'who', 'name', 'marka', 'city', 'address',
        'email', 'phone', 'image', 'email', 'password', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function statusName()
    {
        return $this->hasOne(Status::class, 'id', 'status');
    }

    public function sellerTypes()
    {
        return $this->hasMany(SellerType::class, 'user_id');
    }

    public function whos()
    {
        return $this->hasOne(Who::class, 'id', 'who');
    }

    public function getAnnounceImageName()
    {
        $this->hasOne(Announcement::class, 'user_id', 'id');
    }

    public function getMyName()
    {
        return $this->hasOne(self::class, 'name', 'name');
    }

    public function getSends()
    {
        return $this->hasMany(Announcement::class, 'user_id', 'id');
    }

    public function getOrders()
    {
        return $this->hasMany(Announcement::class, 'name', 'name' );
    }

    public function announcementUser()
    {
        return $this->hasMany(AnnouncementUser::class,'user_id','id');
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class,'id','announcement_id');
    }

    public function getSellerAnswers()
    {
        return $this->belongsToMany(self::class, 'answers', 'user_id','id');
    }

    public function userAnnounces()
    {
        return $this->hasMany(Announcement::class, 'user_id', 'id');
    }

    public function sellerAnswers()
    {
        return $this->hasMany(Answer::class, 'user_id', 'id');
    }

    public function getMyAnswers()
    {
        return $this->hasMany(Answer::class, 'user_id', 'id');
    }
}
