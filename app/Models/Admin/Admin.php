<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;


    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'gender',
        'image',
        'role',
        'status',
    ];

}
