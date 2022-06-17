<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Profile;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_name'
    ];

    protected $casts = [
        'admin_id' => 'integer',
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
