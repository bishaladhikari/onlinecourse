<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    //
    protected $table="courses";
    protected $fillable = [
        'cat_id','name','description'
    ];
    public $timestamps=false;

}
