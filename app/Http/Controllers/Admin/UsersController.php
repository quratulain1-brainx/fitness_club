<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::all();
        return view('admin.users')->with('users',$user);

    }
    public function edit(User $user)
    {
        if (Gate::denies('editUsers')){
            return redirect()->back()->with(['message'=>'Unregistered user']);
        }
        $roles = Role::all();
        return view('admin.edit')->with([
            'user'=> $user,
            'roles'=> $roles
        ]);

    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        if (Gate::denies('deleteUsers')){
            return redirect()->back()->with(['message'=>'Unregistered user']);
        }
        $user->delete();
        return redirect()->route('users.index');
    }
}
