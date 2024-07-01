<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elections extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_election',
        'description_election',
        'sign_up_candidate',
    ];
}