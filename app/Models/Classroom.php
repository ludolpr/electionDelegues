<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_class';

    protected $fillable = [
        'name_class',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id_class');
    }
}