<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['course_id', 'title', 'uid', 'description', 'lesson_type', 'preview', 'sortOrder'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
