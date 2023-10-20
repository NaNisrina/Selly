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
            'date' => 'required|date_format:Y-m-d|before:tomorrow',
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
    public function edit(Sale $sale, $id)
    {
        // $tes = Sale::find($id);
        // $stocks = Stock::all();
        // return($sale);
        return view('edit_sale', [
            "stocks" => Stock::all(),
            "sale" => Sale::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        // dd($request);
        $message = [
            'required' => ':attribute harus diisi',
            'regex' => ':attribute tidak sesuai',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter'
        ];

        $validatedData = $request->validate([
            'date' => 'required|date_format:Y-m-d|before:tomorrow',
            'stock_id' => 'required',
            'stock_sold' => 'required|regex:/^[0-9]+$/|not_in:0',
        ], $message);

        $validatedData['total'] = $validatedData['quantity'] * $validatedData['price'];

        $barang = Stock::where('id', $request->stock_id)->first();

        $barang->update([
        'quantity' => $barang->quantity-$request->stock_sold
        ]);

        // dd($validatedData);

        Sale::where('id', $sale->id)->update($validatedData);

        return redirect()->route('penjualan.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale, $id)
    {
        $sale = Sale::find($id);

        $barang = Stock::where('id', $sale->id)->first();

        $barang->update([
            'quantity' => $barang->quantity + $sale->stock_sold
        ]);

        $sale->delete();

        return back();
    }
}
