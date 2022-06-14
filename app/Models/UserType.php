<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Profile;
use \App\Models\Admin;

class UserType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
    ];


    function Profile()
    {
        return $this->hasOne(Profile::class);
    }

}
