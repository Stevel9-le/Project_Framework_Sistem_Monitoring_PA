<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ProgressLog extends Model
{
    protected $fillable = [
        'project_id',
        'user_id',
        'progress_title',
        'description',
        'progress_date',
        'status',
        'file'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
