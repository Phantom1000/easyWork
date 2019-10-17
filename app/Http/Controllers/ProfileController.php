<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function index(User $user) {
        return view('person', [
            'user' => $user,
            'name' => $user->name,
            'short_description' => $user->short_description,
            'description' => $user->description,
            'avatar' => $user->avatar
        ]);
    }

    public function edit(User $user)
    {
        return view('edit', [
            'user' => $user,
            'name' => $user->name,
            'short_description' => $user->short_description,
            'description' => $user->description,
            'avatar' => $user->avatar
        ]);
    }

    public function update(User $user, Request $request)
    {
        $user->avatar = $request->input('avatar');
        $user->short_description = $request->input('short_description');
        $user->description = $request->input('description');
        $user->save();
        return redirect()->route('profile', $user);
    }
}
