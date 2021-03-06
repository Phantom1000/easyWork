<?php

namespace App\Http\Controllers;

use App\Order;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\User;
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
        //dd($emp);
        $freelancersCount = Cache::remember('freelancers.count', now()->addSeconds(10), function() {
            return Role::getEmployer()->users->count();
        });

        $employersCount = Cache::remember('employers.count', now()->addSeconds(10), function() {
            return Role::getFreelancer()->users->count();
        });

        $ordersCount = Cache::remember('orders.count', now()->addSeconds(10), function () {
            return Order::exchange()->count();
        });

        $worksCount = Cache::remember('works.count', now()->addSeconds(10), function () {
            return Order::where('finish', true)->count();
        });

        return view('index', [
            'freelancersCount' => $freelancersCount,
            'employersCount' => $employersCount,
            'ordersCount' => $ordersCount,
            'worksCount' => $worksCount
        ]);
    }

    public function show(User $user) {
        return view('person', [
            'user' => $user,
            'name' => $user->name,
            'short_description' => $user->short_description,
            'description' => $user->description,
            'avatar' => $user->avatar,
            'isEmployer' => $user->roles->contains(Role::getEmployer()),
            'comments' => $user->comments()->paginate(5),
            'avg' => $user->comments()->pluck('rating')->avg()
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
        $this->validate($request, [
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
