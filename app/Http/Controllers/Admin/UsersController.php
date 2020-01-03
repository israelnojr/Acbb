<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //helper methods
    // public function editUser()
    // {
    //     if(Gate::denies('edit-user')){
    //         return redirect()->back()->with('warning', 'You not allowed to perform this action');
    //     }
    // }

    // public function deleteUser()
    // {
    //     if(Gate::denies('delete-user')){
    //         return redirect()->back()->with('warning', 'You not allowed to perform this action');
    //     }
    // }

    public function index()
    {
        if(Gate::denies('edit-user')){
            return redirect()->back()->with('warning', 'You not allowed to perform this action');
        }

        if(Auth::user()->username == 'super-admin'){
            $users = User::all();
        }
        else{
            $users = User::where('username', '!=', 'super-admin')->get();
        }
        return view('admin.users.index', compact('users'));
    }

    public function adminUsers()
    {
        if(Gate::denies('edit-user')){
            return redirect()->back()->with('warning', 'You not allowed to perform this action');
        }

        $admins = Role::where('name', 'admin')->first()->users()->get();
        return view('admin.users.admins', compact('admins'));
    }

    public function edit(User $user)
    {
        if(Gate::denies('edit-user')){
            return redirect()->back()->with('warning', 'You not allowed to perform this action');
        }
        if(Auth::user()->username == 'super-admin'){
            $roles = Role::all();
        }
        else{ $roles = Role::where('name', '!=', 'superadmin' )->get();}
       return view('admin.users.edit', compact('user', 'roles'));
    }

    
    public function update(Request $request, User $user)
    {
      $user->roles()->sync($request->roles);
      return redirect()->route('admin.users.index')->with('success', 'You\'ve Succesfffully Updated user');
    }

    public function destroy(User $user)
    {
        if(Gate::denies('delete-user')){
            return redirect()->back()->with('warning', 'You not allowed to perform this action');
        }

        $user->roles()->detach();
        $user->delete();
        return redirect()->back()->with('success', 'You\'ve Succesfffully deleted user');
    }

    public function dashboard()
    {
        if(Gate::denies('edit-user')){
            return redirect()->back()->with('warning', 'You not allowed to perform this action');
        }
        return view('admin.dashboard');
    }

    public function status(User $user, $id)
    {
       $user = User::find($id);
        if($user->status == true){
            $user->update(['status' => false]);
            $user->save();
            return redirect()->back()->with('success', 'You\'ve Succesfffully Updated user Status');
        }
        else
        {
            $user->status = false;
            $user->update(['status' => true]);
            $user->save();
            return redirect()->back()->with('success', 'You\'ve Succesfffully Updated user Status');
        }
    }

}
