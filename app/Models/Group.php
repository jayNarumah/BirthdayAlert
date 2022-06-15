<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Profile;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'group_name'
    ];

    protected $casts = [
        'admin_id' => 'integer',
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'admin_id');
    }

    function groupMembers()
    {
        $this->hasMany(GroupMember::class);
    }
}
