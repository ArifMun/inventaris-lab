<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Akun extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'akun';
    protected $fillable = [
        'nama',
        'username',
        'password',
        'level',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'password'
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}