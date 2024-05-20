<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        return view('checkout.index');
    }

    public function validateOrder(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'cardNumb' => 'required',
            'expiDate' => 'required',
            'cvc' => 'required',
        ]);

        $order = new Order();
        $order->user()->associate(auth()->user());
        $order->address = $request->address . ', ' . $request->city . ', ' . $request->zip . ', ' . $request->country;
        $order->total = session('total');
        $order->status = 'pending';
        $order->save();


        foreach (session('cart') as $key => $item) {
            $product = Product::find($key);
            $orderItem = new OrderItem();
            $orderItem->order()->associate($order);
            $orderItem->product()->associate($product);
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $product->price;
            $orderItem->save();

            $product->stock -= $item['quantity'];
            $product->save();
        }

        session()->forget('cart');
        session()->forget('total');

        return view('checkout.result', compact('order'));
    }
}
