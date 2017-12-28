<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $table="courses";
    protected $fillable=[
        'title', 'subtitle', 'slug','category_id', 'user_id', 'image', 'level', 'description', 'price', 'featured', 'published', 'approved'];
    public $timestamps=false;
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
