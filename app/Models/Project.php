<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'abstract',
        'status',
        'start_date',
        'end_date'
    ];

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function progress_Logs()
    {
        return $this->hasMany(Progress_Log::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function sidang_Schedules()
    {
        return $this->hasMany(Sidang_Schedule::class);
    }

    public function assessments()
    {
        return $this->hasMany(Assessment::class);
    }
}
