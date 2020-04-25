<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $fillable = [
        'cat_name',
        'cat_slug',
        'cat_image',
        'cat_description',
        'cat_parent',
    ];


    public function posts(){
        return $this->belongsToMany('App\Posts', 'post_category', 'category_id', 'post_id');
    }
}
