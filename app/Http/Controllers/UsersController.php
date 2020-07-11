<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('role', 1)->orWhere('role', 2)->get();

        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('users.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => 'required'
        ]);

        $users = User::find($id);
        $users->update($data);
        return redirect()->route('users.index')
            ->with('success', 'User has been updated');
    }


    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
