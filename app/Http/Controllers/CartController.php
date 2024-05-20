<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;


class CartController extends Controller
{

    public function index()
    {
        $cart = $this->getCartElements();
        $total = session()->get('total');
        return view('cart.index', ['cart' => $cart, 'total' => $total]);
    }

    public function getCartElements()
    {
        $cartElements = [];
        $total = 0;
        if (session()->has('cart')) {
            foreach (session('cart') as $id => $cart) {
                $product = Product::find($id);
                $cart['product'] = $product;
                $cart['total'] = $product->price * $cart['quantity'];
                $cart['quantity'] = $cart['quantity'];
                $cart['id'] = $id;
                $cart['price'] = $product->price * $cart['quantity'];
                $total += $cart['price'];
                $cartElements[] = $cart;
            }
        }
        session()->put('total', $total);
        return $cartElements;
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);
        $cart = session()->get('cart');
        if ($request->quantity > $product->stock) return redirect()->back()->with('error', 'La quantité de produit n\'est pas suffisante !');
        if ($request->quantity < 1) return redirect()->back()->with('error', 'La quantité de produit doit être d\'au moins 1 !');        
        $cart[$id]['quantity'] = $request->quantity;
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Produit retiré du panier avec succès !');
    }

    public function addElementToCart(Request $request)
    {
        $product = Product::find($request->product_id);
        if (!$product) return redirect()->back()->with('error', 'Produit non trouvé !');
        if ($request->quantity > $product->stock) return redirect()->back()->with('error', 'La quantité de produit n\'est pas suffisante !');
        if ($request->quantity < 1) return redirect()->back()->with('error', 'La quantité de produit doit être d\'au moins 1 !'); 
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $product->id => [
                    'quantity' => $request->quantity,
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Le produit a été ajouté au panier.');
        }
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = $cart[$product->id]['quantity'] + $request->quantity;
            if ($cart[$product->id]['quantity'] > $product->stock) {
                return redirect()->back()->with('error', 'La quantité du produit n\'est pas suffisante !');
            }
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Le produit a été ajouté au panier.');
        }
        $cart[$product->id] = [
            'quantity' => $request->quantity,
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Le produit a été ajouté au panier.');
    }

    public function addPromo(Request $request)
    {
        $promo = $request->promo;
        $discount = Discount::where('code', $promo)->first();
        if (!$discount) return redirect()->back()->with('error', 'Code promo introuvable !');
        if ($discount->created_at > now() || $discount->expires_at < now()) return redirect()->back()->with('error', 'Le code promo n\'est pas valide !');        
        
    
        $total = session()->get('total');
        $priceAfterDiscount = ($total - $discount->value / 100 * $total);
        $priceAfterDiscount = number_format((float)$priceAfterDiscount, 2, '.', '');
        session()->put('total', $total);
        session()->put('promo', [
            'code' => $discount->code,
            'discount' => $discount->value,
            'priceAfterDiscount' => $priceAfterDiscount
        ]);
        return redirect()->back()->with('success', 'Code promo ajouté avec succès !');
    }

    public function removePromo()
    {
        session()->forget('promo');
        return redirect()->back()->with('success', 'Code promo supprimé avec succès !');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
