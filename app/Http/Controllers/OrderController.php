<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $orders;

    public function __construct(OrderRepository $orders)
    {
        $this->orders = $orders;
    }

    public function index(Request $request)
    {
        $isEmployer = false;
        if (Auth::check()) {
            if ($request->user()->roles->where('title', 'Работодатель')->first() != null) $isEmployer = true;
        }
        return view('orders.index', [
            'orders' => $this->orders->all(),
            'change' => false,
            'isEmployer' => $isEmployer
        ]);
    }

    public function myOrders(Request $request) {
        $isEmployer = false;
        if ($request->user()->roles->where('title', 'Работодатель')->first() != null) {
            $isEmployer = true;
            $orders = $this->orders->forEmployer($request->user());
        } else {
            $orders = $this->orders->forFreelancer($request->user());
        }
        return view('orders.index', [
            'orders' => $orders,
            'change' => true,
            'isEmployer' => $isEmployer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('create-order')) {
            return view('orders.create', [
                'order' => null
            ]);
        }
        else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Order::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'employer_id' => $request->user()->id,
            'accept' => false
        ]);
        return redirect()->route('order.my');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.order', [
            'order' => $order,
            'employer' => User::find($order->employer_id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit', [
            'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return redirect()->route('order.my');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $apps = $order->applications;
        foreach ($apps as $app) {
            $app->delete();
        }
        /*if (Gate::allows('delete-order', $order)) {*/
            $order->delete();
            return redirect()->route('order.my');
        /*} else {
            abort(403);
        }*/
    }
}
