<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_election';

    protected $fillable = [
        'name_election', 'description', 'id_class', 'number_votes', 'number_voters'
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'id_class');
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class, 'id_election');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'id_election');
    }
}