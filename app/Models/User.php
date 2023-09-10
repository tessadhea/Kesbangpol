<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\ormas;
use App\Models\ibadah;
use App\Models\keramaian;
use App\Models\penelitian;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $guarded =[];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function ormas(){

           return $this->hasMany(ormas::class);
    }
    public function ibadah(){

       
        return $this->hasMany(ibadah::class);
 }
 public function penelitian(){

       
    return $this->hasMany(penelitian::class);

}
public function keramaian(){

       
    return $this->hasMany(keramaian::class);
    
}
public function getRedirectRoute()
{
    return match((int)$this->role_id) {
        1 => 'admin.index',
        2 => 'dashboard',
        // ...
    };
}
}
