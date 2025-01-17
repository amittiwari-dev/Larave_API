<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Register extends Model
{
    use HasApiTokens, HasFactory;
    
    
    protected $table = 'register';

    protected $fillable = [
        'email',
        'password',
        'country',
        'name'
    ];

    protected $hidden = [
        'password',
    ];
    public $timestamps = false;
}
