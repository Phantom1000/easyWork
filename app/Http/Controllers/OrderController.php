<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Repositories\OrderRepository;
use App\Repositories\UserRepository;
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
    protected $users;

    public function __construct(OrderRepository $orders, UserRepository $users)
    {
        $this->orders = $orders;
        $this->users = $users;
    }

    public function index(Request $request)
    {
        $isEmployer = false;
        //dd(session('role'));
        if (Auth::check()) {
            if ($this->users->isEmp()) $isEmployer = true;
        }
        return view('orders.index', [
            'orders' => $this->orders->all(),
            'change' => false,
            'isEmployer' => $isEmployer
        ]);
    }

    public function myOrders(Request $request) {
        $isEmployer = false;
        if ($this->users->isEmp()) {
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
        $order = Order::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'employer_id' => $request->user()->id,
            'accept' => false
        ]);
        //$order->employer->attach($request->user());
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
            'employer' => $order->employer
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
