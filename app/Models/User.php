<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;
    protected $table = 'inv_akun';
    // protected $guarded = ['ip_login'];
    protected $fillable = [
        'username',
        'password',
        'level',
        'ip_login',
        // 'created_at',
        // 'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        
    ];

    // public function scopeFilter($query, array $filters){
    //     return $query->where('username', '==', 'admin');
    // $query->when($filters['search'] ?? false,function($query, $search){
    //     return $query->where('username','like','%' . $search . '%')
    //                 ->orWhere('nama','like','%'. $search . '%');
    // });

    // }
    // public function identitas(){
    //     return $this->hasMany(Identitas::class);
    // }

    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
}