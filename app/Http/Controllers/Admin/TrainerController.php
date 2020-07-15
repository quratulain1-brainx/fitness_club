<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Gate;

class TrainerController extends Controller
{

    public function index()
    {
        $user = User::whereHas('userRole' ,function ($query) {
            $query->where('role_id', '=', 2);
        })->get();
        return view('admin.viewTrainer')->with('userRole',$user);
    }
    public function create()
    {
        $trainer=User::all();
        return view('admin.addTrainer',['trainer'=>$trainer]);
    }

    public function store(Request $request)
    {
        $trainer = new User();
        $trainer->name= $request->name;
        $trainer->email= $request->email;
        $trainer->save();
        return redirect()->route('/admin/users',$trainer);
    }

    public function edit($id)
    {
        if (Gate::denies('editTrainer')){
            return redirect()->back()->with(['message'=>'Unregistered user']);
        }
        $roles = Role::all();
        return view('admin.editTrainer')->with([
            'roles'=> $roles
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('user-trainer.index');
    }

    public function destroy(User $user)
    {
        if (Gate::denies('deleteTrainer')){
            return redirect()->back()->with(['message'=>'Unregistered user']);
        }
        $user->delete();
        return redirect()->route('user-trainer.index');
    }
}
