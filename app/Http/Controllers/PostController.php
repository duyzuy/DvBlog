<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\User;
use App\Categories;
use App\Tags;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Posts::orderBy('id', 'desc')->paginate('10');
       
        return view('manage.posts.index', compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Categories::all();
        $tags = Tags::all();
        return view('manage.posts.create', compact(['categories', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //Validate
        $request->validate([
            'post_title'    =>  'required|max:255',
            'post_slug'     =>  'required|max:255|unique:posts,post_slug,',
            'post_categories' =>  'required'
        ]);

        $post = new Posts();

        $post->post_title = $request->post_title;
        $post->post_slug = $request->post_slug;
        $post->post_excerpt = $request->post_excerpt;
        $post->post_content = $request->post_content;
        $post->post_status = $request->post_status;
        $post->post_parent = 0;
        $post->comment_status = $request->comment_status;
        $published = Carbon::now();
        $post->published_at = $published->format('Y-m-d H:i:s');
       
        $post->author_id = Auth::user()->id;
        $post->save();


        //Update the categories
        if( $request->post_categories === ''){
            return redirect()->route('posts.create');
        }
        $post->categories()->sync(explode(',', $request->post_categories));


        //update tags
        if( $request->post_tags !== null){
            $post->tags()->sync(explode(',', $request->post_tags));

            //Update number post in tag_count
            $tagsId = explode(',', $request->post_tags);
            foreach($tagsId as $tagId){
                $tag = Tags::where('id', $tagId)->withCount('posts')->get();
                $tag[0]->tag_count = $tag[0]->posts_count;
                $tag[0]->save();

            }
        }

        
        $request->session()->flash('success', 'Create post success fully');
        return redirect()->route('posts.index');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Posts::where('id', $id)->firstOrFail();
        $categories = Categories::all();
        $tags = Tags::all();
        return view('manage.posts.edit', compact(['post', 'categories', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    
        $request->validate([
            'post_title'    =>  'required|max:255',
            'post_slug'     =>  'required|max:255|unique:posts,post_slug,'.$id
        ]);

        $post = Posts::where('id', $id)->firstOrFail();

        $post->post_title = $request->post_title;
        $post->post_slug = $request->post_slug;
        $post->post_excerpt = $request->post_excerpt;
        $post->post_content = $request->post_content;
        $post->post_status = $request->post_status;
        $post->comment_status = $request->comment_status;

        //update categories
        if($request->post_categories === null){
            $request->flash('error', 'just chose category for update');
            return redirect()->route('posts.edit', $id); 
        }else{
            $post->categories()->sync(explode(',', $request->post_categories));
        }
        
        //Update tags
        if($request->post_tags !== null){
            $post->tags()->sync(explode(',', $request->post_tags));
            $tagsId = explode(',', $request->post_tags);
            
            //Get the number of post in tag then update tag_count
            foreach($tagsId as $tagId){
                $tag = Tags::where('id', $tagId)->withCount('posts')->get();
                $tag[0]->tag_count = $tag[0]->posts_count;
                $tag[0]->save();
            }
        }

        $post->save();
        
        $request->session()->flash('success', 'Update post success fully');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $post = Posts::where('id', $id)->firstOrFail();
        $post->delete();
        $post->categories()->detach();

        $request->session()->flash('success', 'Delete post successful!');
        return redirect()->back();
    }

    /*
    * check unique for slug
    * will return true or false
    */

    function apiCheckUnique(Request $request){
        return json_encode(Posts::where('post_slug', $request->post_slug)->exists());

    }
}
