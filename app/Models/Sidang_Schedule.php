<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sidang_Schedule extends Model
{
    protected $fillable = [
        'project_id',
        'type',
        'scheduled_at',
        'room',
        'status'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
