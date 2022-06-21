<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\GroupMember;
use \App\Models\User;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_name'
    ];

    public function user()
    {
        $this->hasOne(User::class);
    }

    function groupMembers()
    {
        $this->hasMany(GroupMember::class);
    }
}
