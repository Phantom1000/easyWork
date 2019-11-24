<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Gate;

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
        $this->authorize('create-application', [$order, $this->users]);
        $app = new Application();
        $app->freelancer()->associate($request->user());
        $app->order()->associate($order);
        $app->save();
        return redirect()->route('order.show', $order);
    }

    public function index(Request $request) {
        if ($this->users->isEmp($request->user())) {
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
        $application->order->applications->where('freelancer_id', '!=', $application->freelancer->id)->each(function($item) {
            $this->reject($item);
        });
        return redirect()->route('application.index');
    }

    public function reject(Application $application) {
        $application->reject = true;
        $application->save();
        return redirect()->route('application.index');
    }

    public function destroy(Application $application) {
        $application->delete();
        return redirect()->route('application.index');
    }
}
