<?php

// App/Models/Candidate.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = ['id_user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function elections()
    {
        return $this->belongsToMany(Election::class, 'elect_candidate', 'id_candidate', 'id_election');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'id_candidate');
    }
}