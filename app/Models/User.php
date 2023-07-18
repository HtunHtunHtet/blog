<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
    protected $guarded = [];

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

    /**
     * This is eloquent mutator
     * This must follow below naming convention
     *
     *
     *  Any point if you set $user->password , below method will run
     *  set{attribute-name}Attribute - See below for example
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * This is eloquent accessor
     * This must follow below naming convention
     *
     * Any pont if you set $user->getUsername, below  method will run
     * get{attribute-name}Attribute - see below for example
     */
    public function getUsernameAttribute($username)
    {
        return ucwords($username);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
