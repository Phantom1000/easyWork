<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use App\Repositories\UserRepository;

use Illuminate\Http\Request;

use App\Order;

use App\Application;

class ApplicationController extends Controller
{
    protected $orders;
    protected $users;

    public function __construct(OrderRepository $orders, UserRepository $users)
    {
        $this->orders = $orders;
        $this->users = $users;
    }
 
    public function create(Request $request, Order $order) {
        $app = new Application();
        $app->freelancer()->associate($request->user());
        $app->order()->associate($order);
        $app->save();
        return redirect()->route('order.index');
    }

    public function index(Request $request) {
        if ($this->users->isEmp()) {
            $flag = false;
            $applications = $request->user()->empApplications;
        }
        else {
            $flag = true;
            $applications = $request->user()->applications;
        }
        return view('applications.index', [
            'applications' => $applications,
            'flag' => $flag
        ]);
    }

    public function accept(Application $application) {
        $application->order->update([
            'freelancer_id' => $application->freelancer->id,
            'accept' => true
        ]);
        return redirect()->route('application.index');
    }

    public function destroy(Application $application) {
        $application->delete();
        return redirect()->route('application.index');
    }
}
