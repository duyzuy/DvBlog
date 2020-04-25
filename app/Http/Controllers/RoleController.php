<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view('manage.roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions = Permission::all();
        return view('manage.roles.create')->with('permissions', $permissions);
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
        
        $request->validate([
            'role_name' => 'required|max:255', 
            'role_slug' =>  'required|max:255|alpha_dash|unique:roles,name', 
            'role_desc' =>  'sometimes|max:255'
        ]);

        $role = new Role();
        $role->name = $request->role_slug;
        $role->display_name = $request->role_name;
        $role->description = $request->role_desc;

        $role->save();
        $role->role_permission()->sync(explode(",", $request->permissions_selected));
        
        $request->flash('success', 'Role create success');
        return redirect()->route('role.index');
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
        $role = Role::where('id', $id)->firstOrFail();
        $permissions = Role::find($id)->role_permission()->get();

        return view('manage.roles.show', compact('role', 'permissions'));
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
        $role = Role::where('id', $id)->firstOrFail();
        $permissions = Permission::all();
   
        return view('manage.roles.edit')->with('role', $role)->with('permissions', $permissions);
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
        //validate \
        // dd($request);
        // return;
        $request->validate([
            'role_name' => 'required|max:255',
            'role_desc' => 'sometimes|max:255'
        ]);
        $role = Role::findOrFail($id);
        $role->display_name = $request->role_name;
        $role->description = $request->role_desc;
        $role->save();
        if($request->permissions_selected != null){
            $role->role_permission()->sync(explode(",", $request->permissions_selected));
        }else{
            $role->role_permission()->detach();
        }

        $request->session()->flash('success', 'Role was upadated');
        return redirect()->route('role.show', $id);
        

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
