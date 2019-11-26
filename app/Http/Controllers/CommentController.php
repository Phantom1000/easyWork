<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function create(Request $request, Order $order)
    {
        if (Gate::allows('create-comment', $order)) {
            return view('comments.create', [
                'order' => $order,
                'freelancer' => $order->freelancer
            ]);
        } else {
            abort(403);
        }
    }

    public function store(Request $request, Order $order)
    {
        $this->validate($request, [
            'description' => 'required',
            'rating' => 'required'
        ]);
        Comment::create([
            'description' => $request->description,
            'rating' => $request->rating,
            'order_id' => $order->id,
            'freelancer_id' => $order->freelancer->id
        ]);
        return redirect()->route('order.my');
    }
}
