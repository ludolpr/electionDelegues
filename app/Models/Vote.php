<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_vote';

    protected $fillable = [
        'id_election',
        'id_candidate',
        'id_user',
    ];

    public function election()
    {
        return $this->belongsTo(Election::class, 'id_election');
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'id_candidate');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}