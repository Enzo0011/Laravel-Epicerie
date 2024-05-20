<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        $products = Product::count();
        $users = User::count();
        $bestSeller = Product::select('products.*', DB::raw('SUM(order_items.quantity) as total_orders'))
            ->leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
            ->groupBy('products.id')
            ->orderBy('total_orders', 'desc')
            ->paginate(5);

        $randomProducts = Product::inRandomOrder()->limit(5)->get();

        return view('home', [
            'products' => $products,
            'users' => $users,
            'bestSeller' => $bestSeller,
            'randomProducts' => $randomProducts
        ]);
    }

}
