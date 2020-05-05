<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  public function __construct(){

    //     $user = Auth::user();
    //     if(!$user->hasRole(['administrator'])){
    //         return 'you have no permission';
    //     }
    //  }

    public function index()
    {
        //
      
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('manage.user.index')->with(compact('users'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('manage.user.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate request
        $request->validate([
            'name'  =>  'required|max:255',
            'email' =>  'required|email|unique:users'
        ]);
        
        //password generate auto
        if(!empty($request->password)){
            $password = trim($request->password);
        } else {
            $length = 10;
            $keyspace = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $str = '';
            $max = mb_strlen($keyspace, '8bit') - 1;

            for($i = 0; $i < $length; ++$i){
                $str .= $keyspace[random_int(0, $max)];
            }
            $password = $str;
        }
         
        //save user

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);

        $user->save();
        if($request->roles_selected !== null){
            $user->roles()->sync(explode(",", $request->roles_selected));
        }
       
        $request->session()->flash('success', 'Create the' .$user->name . 'success fully');
        return redirect()->route('user.show', $user->id);
        

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

        $user = User::where('id', $id)->firstOrFail();
        $roles = $user->user_role()->get();
        return view('manage.user.show')->with('user', $user)->with('roles', $roles);
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
        $user = User::where('id', $id)->firstOrFail();
        $roles = Role::all();
        return view('manage.user.edit')->with('user', $user)->with('roles', $roles);
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
        //validate data
        $request->validate([
            'name'  =>  'required|max:255',
            'email' =>  'required|email|unique:users,email,'.$id
        ]);
        
        //get user id for update
        $user = User::where('id', $id)->firstOrFail();
        $user->name = $request->name;
        $user->email = $request->email;

            
         //password generate auto
         if($request->password_options === 'manual'){
            $user->password = Hash::make($request->password);
        } else if ($request->password_options === 'auto') {
            $length = 10;
            $keyspace = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $str = '';
            $max = mb_strlen($keyspace, '8bit') - 1;

            for($i = 0; $i < $length; ++$i){
                $str .= $keyspace[random_int(0, $max)];
            }
            $user->password = Hash::make($str);
        }
        
        $user->save();
        if($request->roles_selected == null){
            $user->roles()->detach();
           
        }else{
            $user->roles()->sync(explode(",", $request->roles_selected));
        }
       
    
        $request->session()->flash('success', 'User update successfully');            
        return redirect()->route('user.show', $id);
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
