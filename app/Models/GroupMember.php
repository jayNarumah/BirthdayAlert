<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Group;
use \App\Models\Profile;

class GroupMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'group_id',
        'is_active',
    ];

    // protected $with = [
    //     'profiles'
    // ];

    protected $cast = [
        'is_active' => 'boolean',
        'group_id' => 'integer',
        'profile_id' => 'integer',
    ];

    function profile()
    {
        $this->belongsTo(Profile::class);
    }

    function group()
    {
        $this->belongsTo(Group::class);
    }
}
