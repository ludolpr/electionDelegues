<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_user';

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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}