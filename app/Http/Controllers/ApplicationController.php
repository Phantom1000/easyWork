<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;

use Illuminate\Http\Request;

use App\Order;

class ApplicationController extends Controller
{
    protected $orders;

    public function __construct(OrderRepository $orders)
    {
        $this->orders = $orders;
    }
 
    public function create(Request $request, Order $order) {
        $request->user()->orders()->save($order);
        return redirect()->route('order.index');
    }

    public function index(Request $request) {
        $orders = $this->orders->applications($request->user());
        $names = [];
        foreach ($orders as $order) {
            $names[] = $order->freelancer;
        }
        return view('applications.index', [
            'orders' => $orders,
            'names' => $names
        ]);
    }

    public function accept(Order $order) {
        $order->update([
            'accept' => true
        ]);
        return redirect()->route('application.index');
    }

    public function cancel(Order $order)
    {
        $order->update([
            'freelancer_id' => null
        ]);
        return redirect()->route('application.index');
    }
}
