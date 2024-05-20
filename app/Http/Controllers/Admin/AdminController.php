<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $elementToManage = [
            'products' => ['name' => 'Products', 'route' => 'admin.products.index'],
            'orders' => ['name' => 'Orders', 'route' => 'orders.index'],
            'categories' => ['name' => 'Categories', 'route' => 'categories.index'],
            'discounts' => ['name' => 'Discounts', 'route' => 'discounts.index'],
        ];
        return view('admin.index', compact('elementToManage'));
    }
}
