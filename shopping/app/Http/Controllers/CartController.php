<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\Product;

class CartController extends Controller
{
    public function view(CartHelper $cart)
    {
        return view('cart',compact('cart'));
    }

    public function add(CartHelper $cart,$id)
    {
        $product = Product::find($id);
        $cart->add($product);
        return redirect()->route('home.shop');
    }

    public function remove(CartHelper $cart,$id)
    {
        $cart->remove($id);
        return redirect()->back();
    }

    public function update(CartHelper $cart,$id)
    {
        $quantity = request()->quantity ? request()->quantity : 1;
        $cart->update($id,$quantity);
        return redirect()->back();
    }

    public function clear(CartHelper $cart)
    {
        $cart->clear();
        return redirect('shop');
    }
}
