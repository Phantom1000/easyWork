<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;

$factory->defineAs(Role::class, 'employer', function () {
    return [
        'title' => 'Работодатель',
    ];
});

$factory->defineAs(Role::class, 'freelancer', function () {
    return [
        'title' => 'Фрилансер',
    ];
});
