<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\History;

class SummaryController extends Controller
{
    public function index()
    {
        return view('/summary', [
            'title' => 'Summary',
            'carts' => Cart::where('user_id', auth()->user()->id)->get(),
            'coupons' => Coupon::get(),
        ]);
    }
    public function confirm(Request $request)
    {
        // dd($request);
        $data = ([
            'user_id' => $request['user_id'],
            'coupon_id' => $request['coupon_id'],
            'order_date' => now(),
            'total' => $request['total'],
        ]);
        $history = History::create($data);
        Cart::where('user_id', auth()->user()->id)->delete();
        return redirect('/history');
    }
}
