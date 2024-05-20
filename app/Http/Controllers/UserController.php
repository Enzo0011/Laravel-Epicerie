<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders;
        return view('profil', compact('orders'));
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return back();
    }
}
