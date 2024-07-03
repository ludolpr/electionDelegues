<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'pseudonym',
        'password',
        'email',
        'address',
        'zipcode',
        'town',
        'picture',
        'birthday',
        'id_class',
        'id_role' 
    ];

   
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }


    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'id_class');
    }


    public function votes()
    {
        return $this->hasMany(Vote::class, 'id_user');
    }

 
    public function candidates()
    {
        return $this->hasMany(Candidate::class, 'id_user');
    }


    public function elections()
    {
        return $this->hasMany(Election::class, 'id_user');
    }

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
}