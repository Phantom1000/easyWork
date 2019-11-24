<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Order;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employer = factory(Role::class, 'employer', 1)->create();
        $freelancer = factory(Role::class, 'freelancer', 1)->create();
        factory(User::class, 5)->create()->each(function ($user) use ($employer) {
            $user->roles()->attach($employer);
            //$user->orders()->save(factory(Order::class)->make());
            $order = factory(Order::class)->create()->employer()->associate($user);
            $order->save();
        });
        /*factory(Order::class, 3)->create([
            'user_id' => 1
        ]);*/
        factory(User::class, 5)->create()->each(function ($user) use ($freelancer) {
            $user->roles()->attach($freelancer);
        });
    }
}
