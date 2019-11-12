<?php

namespace App\Repositories;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserRepository
{
    /**
     * Получить все задачи заданного пользователя.
     *
     * @param  User  $user
     * @return Collection
     */

    public function isEmp() {
        return session('role')->title == 'Работодатель';
        /*$emp = Cache::get('roles.employer', Role::where('title', 'Работодатель')->take(1)->get());
        //$emp = Role::where('title', 'Работодатель')->take(1)->get();
        return $user->roles->contains($emp[0]);*/
    }

}
