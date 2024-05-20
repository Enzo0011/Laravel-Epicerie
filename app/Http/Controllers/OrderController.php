<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        if ($order->user_id != auth()->id() && !auth()->user()->isAdmin())
            return redirect('/');
        return view('orders.show', compact('order'));
    }

    public function update($id, Request $request)
    {
        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();
        return redirect()->back();
    }
}
