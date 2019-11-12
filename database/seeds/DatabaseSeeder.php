<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Order;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(
            ['title' => 'Работодатель'],
        );

        Role::create(
            ['title' => 'Фрилансер'],
        );

    }
}
