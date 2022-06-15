<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\UserType;
use \App\Models\User;
use \App\Models\Group;
use \App\Models\GroupMember;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
        'phone_number',
        'dob',
        'gender'
    ];

    protected $cast = [
    ];

    // function userType()
    // {
    //     return $this->belongsTo(UserType::class);
    // }
    // function groups()
    // {
    //     $this->belongsToMany(Group::class);
    // }
    function user()
    {
        $this->hasOne(User::class);
    }
    function groupMembers()
    {
        return $this->hasMany(GroupMember::class);
    }

}
