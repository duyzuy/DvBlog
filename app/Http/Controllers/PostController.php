<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\User;
use App\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


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
        return view('manage.posts.create', compact('categories'));
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
            'post_category' => 'required|integer'
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
        
       
        if( $request->post_categories === ''){
            return redirect()->route('posts.create');
        }
        $post->save();
        $post->categories()->sync(explode(',', $request->post_categories));
        $request->flash('success', 'Create post success fully');
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
        return view('manage.posts.edit', compact(['post', 'categories']));
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

        if($request->post_categories === null){
            $request->flash('error', 'just chose category for update');
            return redirect()->route('posts.edit', $id); 
        }else{
            $post->categories()->sync(explode(',', $request->post_categories));
        }
    

        $post->save();
        
        $request->flash('success', 'Update post success fully');
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
