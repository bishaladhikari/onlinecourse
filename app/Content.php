<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'lesson_id',
        'content_type',
        'video_filename',
        'video_path',
        'video_src',
        'article_body',
    ];


    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
