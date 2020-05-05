<?php

namespace App\Http\Controllers\Frontend;

use App\Posts;
use App\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class PostController extends Controller
{
    //
    public function lists(){
        $posts = Posts::orderBy('id', 'desc')->paginate(2);
        return view('frontend.posts.lists', compact(['posts']));
    }


    public function postdetail(Request $request){

       //get single post
        $post = Posts::where('post_slug', $request->post_slug)->firstOrFail();
      
        //get post related
        $postRelated = Posts::whereHas('categories', function (Builder $query) use ($post){
            return $query->whereIn('id', $post->categories->pluck('id')); 
        })
        ->where('id', '!=', $post->id) // So you won't fetch same post
        ->orderBy('id', 'desc')
        ->take(4)
        ->get();


        return view('frontend.posts.detail', compact(['post', 'postRelated']));
    }
}
