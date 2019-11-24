<?php

namespace App\Repositories;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserRepository
{
    /**
     * Получить все задачи заданного пользователя.
     *
     * @param  User  $user
     * @return Collection
     */

    public function isEmp($user) {
        if (Session::get('roles') == null) {
            Session::put('roles', $user->roles);
        }
        $roles = Session::get('roles');
        foreach ($roles as $role) {
            if ($role->title == 'Работодатель') return true;
        }
        return false;
    }

}
