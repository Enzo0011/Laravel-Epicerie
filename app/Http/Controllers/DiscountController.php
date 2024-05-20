<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
        return view('discounts.index', compact('discounts'));
    }

    public function create()
    {
        return view('discounts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:255',
            'value' => 'required|numeric',
            'expires_at' => 'required|date',
        ]);
        $discount = new Discount();
        $discount->code = $request->code;
        $discount->value = $request->value;
        $discount->expires_at = $request->expires_at;
        $discount->save();

        return redirect()->route('discounts.index');
    }

    public function edit($id)
    {
        $discount = Discount::find($id);
        return view('discounts.edit', compact('discount'));
    }

    public function update($id, Request $request)
    {
        $discount = Discount::find($id);
        $discount->code = $request->code;
        $discount->value = $request->value;
        $discount->save();

        return redirect()->route('discounts.index');
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();

        return redirect()->route('discounts.index');
    }
}
