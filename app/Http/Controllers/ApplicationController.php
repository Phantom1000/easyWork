<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;

use Illuminate\Http\Request;

use App\Order;

use App\Application;

class ApplicationController extends Controller
{
    protected $orders;

    public function __construct(OrderRepository $orders)
    {
        $this->orders = $orders;
    }
 
    public function create(Request $request, Order $order) {
        $app = new Application();
        $app->freelancer()->associate($request->user());
        $app->order()->associate($order);
        $app->save();
        return redirect()->route('order.index');
    }

    public function index(Request $request) {
        if ($request->user()->roles->where('title', 'Работодатель')->first() != null) {
            $applications = $request->user()->applications;
            return view('applications.index', [
                'applications' => $applications,
                'flag' => false
            ]);
        }
        if ($request->user()->roles->where('title', 'Фрилансер')->first() != null) {
            $applications = $request->user()->applications;
            return view('applications.index', [
                'applications' => $applications,
                'flag' => true
            ]);
        }
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
