<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Posts extends Model
{
    //
    protected $fillable = [
        'post_title',
        'post_slug',
        'author_id',
        'post_excerpt',
        'post_status',
        'post_type',
        'comment_count',
        'comment_status',
        'post_parent',
        'published_at'

    ];


    public function categories(){

        return $this->belongsToMany('App\Categories', 'post_category', 'post_id', 'category_id');
    }

    public function author(){
        return $this->belongsTo('App\User');
    }
}
