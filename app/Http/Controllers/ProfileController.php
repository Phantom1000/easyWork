<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Gate;

class ProfileController extends Controller
{
    public function show(User $user) {
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
        /*if (Gate::allows('update-profile', $user))*/ {
            return view('edit', [
                'user' => $user,
                'name' => $user->name,
                'short_description' => $user->short_description,
                'description' => $user->description,
                'avatar' => $user->avatar
            ]);
        }
    }

    public function update(User $user, Request $request)
    {
        if ($user->avatar) $user->avatar = $request->file('avatar')->store('uploads', 'public');
        $user->short_description = $request->input('short_description');
        $user->description = $request->input('description');
        $user->save();
        return redirect()->route('profile', $user);
    }
}
