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

    function profiles()
    {
        $this->belongsTo(Profile::class);
    }

    function groups()
    {
        $this->belonsTo(Group::class);
    }
}
