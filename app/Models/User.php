<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use \App\Models\UserType;
use \App\Models\Group;
use \App\Models\Profile;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'profile_id',
        'user_type_id',
        'email',
        'password',
        'group_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'profile_id' => 'integer',
        'user_type_id' => 'integer',
        'group_id' => 'integer'
    ];

    // protected $with = [
    //     'profile',
    //     'group'
    // ];

    function userType()
    {
        return $this->belongsTo(UserType::class);
    }

    function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    function group()
    {
        return $this->belongsTo(Group::class);
    }
}
