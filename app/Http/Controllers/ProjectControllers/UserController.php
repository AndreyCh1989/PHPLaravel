<?php

namespace App\Http\Controllers\ProjectControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view(
            'objects.users.index',
            ['users' => User::where('id', '<>', \Auth::user()->id)->get()]);
    }

    public function edit(User $user) {
        return view('objects.users.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user) {
        $user->fill($request->all());
        $user->save();

        $message = "User \"{$user->name}\" has been successfully updated";
        return redirect()->route('user.index')->with('message',  $message);
    }
}
