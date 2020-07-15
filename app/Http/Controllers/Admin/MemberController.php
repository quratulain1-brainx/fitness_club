<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;

class MemberController extends Controller
{

    public function index()
    {
        $user = User::whereHas('userRole' ,function ($query) {
        $query->where('role_id', '=', 3);
        })->get();
        return view('admin.addMember') ->with('userRole',$user);
    }

    public function create()
    {
        $members=User::all();
        return view('admin.newMember',['members'=>$members]);
    }

    public function store(Request $request)
    {
        $member = new User();
        $member->name= $request->name;
        $member->email= $request->email;
        $member->save();
        return redirect()->route('/admin/users',$member);
    }

    public function edit($id)
    {
        if (Gate::denies('editMember')){
            return redirect()->back()->with(['message'=>'Unregistered user']);
        }
        $roles = Role::all();
        return view('admin.editMember')->with([
            'roles'=> $roles
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('user-members.index');
    }
    public function destroy(User $user)
    {
        if (Gate::denies('deleteMember')){
            return redirect()->back()->with(['message'=>'Unregistered user']);
        }
        $user->delete();
        return redirect()->route('user-members.index');
    }
}
