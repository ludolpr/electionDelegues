<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $primaryKey = 'id_candidate';
    protected $fillable = ['id_user', 'id_election'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function election()
    {
        return $this->belongsTo(Election::class, 'id_election');
    }
}