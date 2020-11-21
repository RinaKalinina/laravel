<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show()
    {
        return view('admin.users.index')
            ->with('users', User::query()->paginate(20));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(UserRequest $request)
    {
        $isAdmin = false;
        if ($request->is_admin) {
            $isAdmin = true;
        }

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $isAdmin;
        $user->save();

        return redirect()->back();
    }
}
