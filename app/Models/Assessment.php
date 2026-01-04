<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = [
        'project_id',
        'lecturer_id',
        'score',
        'notes'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }
}
