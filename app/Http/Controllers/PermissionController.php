<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $permissions = Permission::orderBy('id', 'desc')->paginate(10);
        return view('manage.permissions.index')->with('permissions', $permissions);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('manage.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        //validate data
        if($request->permission_options == 'basic_permission'){

            $request->validate([
                'permission_name'   =>  'required|max:255',
                'permission_slug'   =>  'required|max:255|alpha_dash|unique:permissions,name',
                'permission_desc'   =>  'sometimes|max:255'
            ]);

            $permission = new Permission();
            $permission->display_name = $request->permission_name;
            $permission->name = $request->permission_slug;
            $permission->description = $request->permission_desc;
            $permission->save();
            $request->session()->flash('success', 'Permission has been successsfully added');
            return redirect()->route('permission.index');
            
        }elseif($request->permission_options == 'crud_permission'){

            //validate

            $request->validate([
                'resource' => 'required|min:3|max:100|alpha'
            ]);
            
            $crud = explode(',', $request->crud_selected);
            if(count($crud) > 0){
                foreach($crud as $x){
                    $slug = $x . '-' . strtolower($request->resource);
                    $display_name = ucfirst($x) . ' ' . ucfirst($request->resource);
                    $desc = 'Allow user to ' . strtoupper($x) . ' a ' . ucfirst($request->resource);
                

                    $permission = new Permission();

                    $permission->display_name = $display_name;
                    $permission->name = $slug;
                    $permission->description = $desc;
                    $permission->save();
                 

                }
                $request->session()->flash('success', 'Permission has been successsfully added');
                return redirect()->route('permission.index');
            }else{
                return redirect()->route('permission.index')->withInput();
            }
        }
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
        $permission = Permission::where('id', $id)->firstOrFail();
        return view('manage.permissions.show')->with('permission', $permission);
        
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

        $permission = Permission::where('id', $id)->firstOrFail();
        return view('manage.permissions.edit')->with('permission', $permission);
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
            'permission_name'   =>  'required|max:255',
            'permission_desc'   =>  'sometimes|max:255'
        ]);

        $permission = Permission::where('id', $id)->firstOrFail();
        $permission->display_name = $request->permission_name;
        $permission->description = $request->permission_desc;

        $permission->save();
        
        $request->session()->flash('success', 'Permission has been updated');
        return redirect()->route('permission.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
