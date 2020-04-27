<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Tags;
use App\Posts;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tags::orderBy('id', 'desc')->get();
             
        return view('manage.tags.index')->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        // dd(Str::of($request->tag_name)->slug('-'));
       $request->validate([
           'tag_name'   =>  'required|unique:tags,tag_name|min:6|max:30'
       ]);
        $slug = Str::of($request->tag_name)->slug('-');
       $tag = new Tags();
       $tag->tag_name = $request->tag_name;
       $tag->tag_slug = $slug;
        $tag->save();
        $request->session()->flash('success', 'Create <strong><em>"' . $tag->tag_name . '"</em></strong> tag successfully');
        return redirect()->route('tags.index');
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
        $tag = Tags::where('id', $id)->firstOrFail();
        $tags = Tags::all();
        return view('manage.tags.edit')->with('tag', $tag)->with('tags', $tags);
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
            'tag_name'   =>  'required|unique:tags,tag_name,'.$id.'|min:6|max:30'
        ]);
        $slug = Str::of($request->tag_name)->slug('-');
        $tag = Tags::where('id', $id)->firstOrFail();
        $tag->tag_name = $request->tag_name;
        $tag->tag_slug = $slug;
        $tag->save();
        $request->session()->flash('success', 'Update <strong><em>"' . $tag->tag_name . '"</em></strong> tag successfully');
        return redirect()->route('tags.index');
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
        $tag = Tags::where('id', $id)->firstOrFail();
        $tag->delete();
        $request->session()->flash('success', 'Delete <strong><em>"' . $tag->tag_name . '"</em></strong> successfuly');
        return redirect()->route('tags.index');
    }
}
