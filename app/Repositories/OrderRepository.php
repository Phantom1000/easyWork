<?php

namespace App\Repositories;

use App\Order;

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
        return Order::orderBy('created_at', 'asc')->get();
    }
}
