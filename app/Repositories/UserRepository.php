<?php

namespace App\Repositories;

use App\User;
use App\Role;
use Illuminate\Support\Facades\Session;

class UserRepository
{
    /**
     * Получить все задачи заданного пользователя.
     *
     * @param  User  $user
     * @return Collection
     */

    public function isEmp(User $user) {
        $role = Session::get('role');
        if ($role != null) return $role == 'employer';
        else {
            $emp = Role::getEmployer();
            if ($user->roles->contains($emp)) {
                Session::put('role', 'employer');
                return true;
            } else {
                Session::put('role', 'freelancer');
                return false;
            }
        }
        /*$emp = Cache::get('roles.employer', Role::where('title', 'Работодатель')->take(1)->get());
        //$emp = Role::where('title', 'Работодатель')->take(1)->get();
        return $user->roles->contains($emp[0]);*/
    }

}
