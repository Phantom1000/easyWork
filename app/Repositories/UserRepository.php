<?php

namespace App\Repositories;

use App\User;
use App\Role;

class UserRepository
{
    /**
     * Получить все задачи заданного пользователя.
     *
     * @param  User  $user
     * @return Collection
     */

    public function getEmp(User $user) {
        $emp = Role::where('title', 'Работодатель')->take(1)->get();
        return $user->roles->contains($emp[0]);
    }

}
