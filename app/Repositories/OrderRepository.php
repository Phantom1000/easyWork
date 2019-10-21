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
    public function all()
    {
        return Order::orderBy('created_at', 'desc')->paginate(10);
    }

    public function forUser(User $user) {
        return Order::orderBy('created_at', 'desc')->where('employer_id', $user->id)->paginate(10);
    }

    public function applications(User $user) {
        return Order::orderBy('created_at', 'desc')->whereNotNull('freelancer_id')->where('accept', false)->paginate(10);
    }
}
