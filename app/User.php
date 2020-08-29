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
        'who', 'name', 'marka', 'autoNumber', 'city', 'address',
        'email', 'image', 'email', 'password', 'status'
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
}
