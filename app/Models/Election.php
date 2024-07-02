<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_election';
    
    protected $fillable = [
        'name_election',
        'description_election',
        'sign_up_candidate',
    ];
}