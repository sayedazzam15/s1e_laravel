<?php

namespace App\Models;

use App\Models\Scopes\UserTypeScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;

#[ScopedBy([UserTypeScope::class])]
class Admin extends User
{
    use  HasFactory;
    protected $hidden = ['password','remember_token'];
    public $type = 'admin';
    protected $table = 'users';
}
