<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;
use App\Role;
use Illuminate\Support\Facades\Cache;

class ProfileController extends Controller
{
    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function index() {
        $emp = Cache::remember('roles.employer', now()->addHours(2), function() {
            return Role::where('title', 'Работодатель')->take(1)->get();
        });
        $free = Cache::remember('roles.freelancer', now()->addHours(2), function() {
            return Role::where('title', 'Фрилансер')->take(1)->get();
        });

        //$emp = Role::where('title', 'Работодатель')->take(1)->get();
        //$free = Role::where('title', 'Фрилансер')->take(1)->get();
        //dd($emp);
        $freelancersCount = Cache::remember('freelancers.count', now()->addSeconds(10), function () use($free) {
            return $free[0]->users->count();
        });

        $employersCount = Cache::remember('employers.count', now()->addSeconds(10), function () use ($emp) {
            return $emp[0]->users->count();
        });

        return view('index', [
            'freelancersCount' => $freelancersCount,
            'employersCount' => $employersCount
            /*'ordersCount' => $ordersCount,
            'worksCount' => $worksCount*/
        ]);
    }

    public function show(User $user) {
        return view('person', [
            'user' => $user,
            'name' => $user->name,
            'short_description' => $user->short_description,
            'description' => $user->description,
            'avatar' => $user->avatar,
            'isEmployer' => $this->users->getEmp($user)
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
        return redirect()->route('profile.show', $user);
    }
}
