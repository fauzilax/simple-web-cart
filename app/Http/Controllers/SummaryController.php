<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;

class SummaryController extends Controller
{
    public function index()
    {
        return view('/summary', [
            'title' => 'Summary',
            'carts' => Cart::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
