<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        return view('/cart', [
            'title' => 'Cart',
            'active' => 'active',
            'carts' => Cart::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public function addtocart(Request $request)
    {
        $data = ([
            'product_id' => $request['product_id'],
            'user_id' => $request['user_id'],
            'quantity' => $request['quantity'],
        ]);

        $cekCart = Cart::where('user_id', $request['user_id'])->where('product_id', $request['product_id'])->first();

        if ($cekCart) {
            $updData = ([
                'quantity' => $cekCart['quantity'] + 1,
            ]);
            Cart::where('user_id', $request['user_id'])->where('product_id', $request['product_id'])->update($updData);
        } else {
            Cart::create($data);
        }
        return back()->with('success', 'Success add product to cart');
    }

    public function deleteproduct($id)
    {
        Cart::where('id', $id)->delete();
        return back()->with('success', 'Success delete from cart');
    }
}
