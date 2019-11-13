<?php

namespace App\Repositories;

use App\Order;
use App\User;

class OrderRepository
{
    /**
     * Получить все задачи заданного пользователя.
     *
     * @param  Order  $order
     * @return Collection
     */
    /*public function all()
    {
        return Order::orderBy('created_at', 'desc')->get();
    }*/

    public function forEmployer(User $user) {
        return Order::where('employer_id', $user->id)->get();
    }

    public function forFreelancer(User $user)
    {
        return Order::where('freelancer_id', $user->id)->get();
    }

    public function applications() {
        return Order::whereNotNull('freelancer_id')->where('accept', false)->get();
    }
}
