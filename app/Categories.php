<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $table="categories";
    protected $fillable = [
        'name',
    ];
    public $timestamps=false;
    public function courses(){
        return $this->hasMany(Courses::class,'cat_id','id');
    }
}
