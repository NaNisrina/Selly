<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class HomeController extends Controller
{
    public function index() {
        $stocks = Stock::all();
        return view('home', compact('stocks'));
    }
}
