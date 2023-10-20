<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Stock;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::all();
        return view('penjualan', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stocks = Stock::all();
        
        return view('create_penjualan', compact('stocks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request);
        $message = [
            'required' => ':attribute harus diisi',
            'regex' => ':attribute tidak sesuai',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter'
        ];

        $validatedData = $request->validate([
            'date' => 'required',
            'stock_id' => 'required',
            'stock_sold' => 'required|regex:/^[0-9]+$/|not_in:0',
        ], $message);

        

        // $price = $request->price;

        // dd($price);

        $validatedData['total'] = $validatedData['stock_sold'] * $request->price;

        $barang = Stock::where('id', $request->stock_id)->first();

        $barang->update([
        'quantity' => $barang->quantity-$request->stock_sold
        ]);

        // dd($price);
        // dd($validatedData);

        Sale::create($validatedData);

        return redirect()->route('penjualan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
