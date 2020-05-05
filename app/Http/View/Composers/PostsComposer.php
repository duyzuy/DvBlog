<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Posts;

class PostsComposer
{

    public function compose($view)
    {
        $view->with('postsRecent', Posts::orderBy('id', 'desc')->paginate(3));
    }
    
}