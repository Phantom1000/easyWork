<?php

namespace App\Repositories;

use App\User;
use App\Role;
use Illuminate\Support\Facades\Cache;

class UserRepository
{
    /**
     * Получить все задачи заданного пользователя.
     *
     * @param  User  $user
     * @return Collection
     */

    public function getEmp(User $user) {
        $emp = Cache::get('roles.employer', Role::where('title', 'Работодатель')->take(1)->get());
        //$emp = Role::where('title', 'Работодатель')->take(1)->get();
        return $user->roles->contains($emp[0]);
    }

}
