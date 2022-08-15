<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index', ['users' => User::all()]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function edit($id)
    {
        return view('user.edit', ['user' => User::findOrFail($id)]);
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);
        $user = User::create(request(['name', 'email', 'password']));
        return redirect('users')->with('success','User successfully created');
    }

    public function update($id , Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'password' => 'required|confirmed',
        ]);
        $user = User::findOrFail($id);
        $user->update(request(['name', 'password', 'is_admin']));
        return redirect('users')->with('success','User successfully updated');
    }
    public function delete($id)
    {
        if (auth()->user()->id == $id){
            return redirect()->back()->with('error','You cannot delete yourself');
        }
        User::destroy($id);
        return redirect('users')->with('success','User successfully deleted');
    }
    public function restore($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();
        return redirect('users')->with('success','User successfully recovered');
    }
    public function forceDelete($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->forceDelete();
        return redirect('users')->with('success','User successfully permanently deleted');
    }
}
