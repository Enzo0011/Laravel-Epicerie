<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Support\Facades\DB;
use App\Models\Discount;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->query('sort');

        $products = Product::select('products.*', DB::raw('SUM(order_items.quantity) as total_orders'))
        ->leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
        ->groupBy('products.id')
        ->paginate(6);

        $categories = Categorie::all();


        return view('products.index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);

        // $discount = Discount::where('expires_at', '>', now())
        // ->orderBy('expires_at', 'asc')
        // ->first(); 

        return view('products.show', [
            'product' => $product
        ]);
    }
    
}
