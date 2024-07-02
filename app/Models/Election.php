<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_election';
    
    protected $fillable = [
        'name_election', 'description', 'number_voters', 'number_votes'
    ];
    public function votes()
    {
        return $this->hasMany(Vote::class, 'id_election');
    }

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'elect_candidate', 'id_election', 'id_candidate');
    }
}