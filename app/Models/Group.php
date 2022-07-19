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

    /**
     * Get all of the groupMember for the Group
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function groupMembers()
    {
        return $this->hasMany(GroupMember::class, 'group_id', 'id');
    }

    /**
     * Get the groupAdmin associated with the Group
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function groupAdmin()//: HasOne
    {
        return $this->hasOne(GroupAdmin::class, 'group_id', 'id');
    }

}
