<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('manage.categories.index');
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
        return view('manage.categories.create')->with('categories', $categories);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        //Validate
        

        $request->validate([
            'cat_name'      =>  'required|max:255',
            'cat_slug'      =>  'max:255|alpha_dash|unique:categories,cat_slug',
            'cat_parent'    =>  'integer',
        ]);

        $cat = new Categories();
        $cat->cat_name = $request->cat_name;
        if($request->cat_slug == null){
            $cat->cat_slug = Str::of($request->cat_name)->slug('-');
        }else{
            $cat->cat_slug = Str::of($request->cat_slug)->slug('-');
        }
        
        $cat->cat_description = $request->cat_desc;
        if($request->cat_parent !== 0){
            $cat->cat_parent = $request->cat_parent;
        }
        if($request->cat_image === null){
            $cat->cat_image = 'image-default.jpg';
        }
        $cat->cat_parent = $request->cat_parent;
        $cat->save();
        
        $request->session()->flash('success', 'Create category success full');
        return redirect()->route('categories.index');
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
        $category = Categories::where('id', $id)->firstOrFail();
        $categories = Categories::all()->except($id);
        return view('manage.categories.edit', compact(['category', 'categories']));
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
        
        $request->validate([
            'cat_name'      =>  'required|max:255',
            'cat_slug'      =>  'required|max:255|alpha_dash|unique:categories,cat_slug,'.$id,
            'cat_parent'    =>  'integer',
        ]);

        $cat = Categories::where('id', $id)->firstOrFail();
        
        $cat->cat_name = $request->cat_name;

        if($request->cat_slug == null){
            $cat->cat_slug = Str::of($request->cat_name)->slug('-');
        }else{
            $cat->cat_slug = $request->cat_slug;
        }
        
        $cat->cat_description = $request->cat_desc;
        $cat->cat_parent = $request->cat_parent;
        if($request->cat_image === null){
            $cat->cat_image = 'image-default.jpg';
        }
        $cat->save();
        
        $request->session()->flash('success', 'Update category success full');
        return redirect()->route('categories.create');

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
        $cat = Categories::where('id', $id)->firstOrFail();
        $cat->delete();
        // DB::table('categories')->where('id', $id)->delete();
    
        $request->session()->flash('success', 'Delete category success full');
        return redirect()->route('categories.create');
    }
}
