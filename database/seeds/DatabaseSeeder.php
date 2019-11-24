<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Order;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        /*Role::create(
            ['title' => 'Работодатель'],
        );

        Role::create(
            ['title' => 'Фрилансер'],
        );*/
    }
}
