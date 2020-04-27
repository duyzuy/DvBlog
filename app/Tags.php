<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //
    protected $fillable = [
        'tag_name',
        'tag_slug'
    ];

    // morphToMany($related, $name, $table = null, $foreignPivotKey = null, $relatedPivotKey = null, $parentKey = null, $relatedKey = null, $inverse = false)
    public function posts(){

        return $this->morphedByMany('App\Posts', 'tagable', 'tagable_type', 'tag_id', 'tagable_id');
    }

}
