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

        $test = new Order();
        $test->title = 'Практика Сыча';
        $test->description = 'Сделать биржу труда';
        $test->employer_id = 4;
        $test->accept = false;
        $test->save();
    }
}
