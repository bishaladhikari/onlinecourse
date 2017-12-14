<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseCategories extends Model
{
    //
    protected $table="course_categories";
    protected $fillable = [
        'name',
    ];
    public $timestamps=false;
}
