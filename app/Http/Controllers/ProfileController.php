<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;

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
        $data = $request->validate([
            'avatar' => ['image'],
        ]);
        if ($request->avatar) {
            $path = $request->file('avatar')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$path}"))->fit(1200, 1200);
            $image->save();
            $user->avatar = $path;
        }

        $user->short_description = $request->input('short_description');
        $user->description = $request->input('description');
        $user->save();
        return redirect()->route('profile', $user);
    }
}
