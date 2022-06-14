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

    protected $with = [
        'group',
        'profile'
    ];

    protected $cast = [
        'is_active'
    ];

    function profile()
    {
        $this->belongsTo(Profile::class);
    }
    function group()
    {
        $this->belonsTo(Group::class);
    }
}
