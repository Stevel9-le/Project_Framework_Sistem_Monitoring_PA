<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = [
        'name',
        'nidn',
        'email',
        'phone'
    ];

    public function assessments()
    {
        return $this->hasMany(Assessment::class);
    }
}
