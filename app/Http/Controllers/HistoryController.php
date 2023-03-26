<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{
    public function index()
    {
        return view('history', [
            'title' => 'History',
            'histories' => History::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
