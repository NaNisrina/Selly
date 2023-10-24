<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // HALAMAN STOK
    public function index()
    {
        $stocks = Stock::all();
        return view('stock', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // HALAMAN TAMBAH STOK
    public function create()
    {
        return view('create_stock');
    }

    /**
     * Store a newly created resource in storage.
     */
    // MENYIMPAN STOK
    public function store(Request $request)
    {
        // CUSTOM MESSAGE
        $message = [
            'required' => ':attribute harus diisi',
            'mimes' => ':attribute harus bertipe jpg, png, atau jpeg',
            'regex' => ':attribute tidak sesuai',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter'
        ];

        // VALIDASI
        $validatedData = $request->validate([
            'product_img' => 'required|mimes:jpg, png, jpeg',
            'product_name' => 'required||min:3|max:50',
            'product_description' => 'required|min:3|max:255',
            'quantity' => 'required|regex:/^[0-9]+$/|not_in:0',
            'price' => 'required|regex:/^[1-9][0-9]+$/|not_in:0'
        ], $message);

        $validatedData['product_img'] = $request->file('product_img')->store('product_img');
        $validatedData['total'] = $validatedData['quantity'] * $validatedData['price'];

        // dd($validatedData);

        // SIMPAN
        Stock::create($validatedData);

        return redirect()->route('stock.index')->with('success', 'Stok berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // HALAMAN EDIT STOK
    public function edit(Stock $stock)
    {
        // return($stock);
        return view('edit_stock', [
            'stock' => $stock
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // UPDATE STOK
    public function update(Request $request, Stock $stock)
    {
        // CUSTOM MESSAGE
        $message = [
            'required' => ':attribute harus diisi',
            'mimes' => ':attribute harus bertipe jpg, png, atau jpeg',
            'regex' => ':attribute tidak sesuai',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter'
        ];

        // VALIDASI
        $validatedData = $request->validate([
            'product_img' => 'mimes:jpg, png, jpeg',
            'product_name' => 'required|min:3|max:50',
            'product_description' => 'required|min:3|max:255',
            'quantity' => 'required|regex:/^[0-9]+$/|not_in:0',
            'price' => 'required|regex:/^[1-9][0-9].+$/|not_in:0'
        ], $message);

        // CEK FOTO
        if($request->file('product_img')) {
            if($request->oldImg) {
                Storage::delete($request->oldImg);
            }
            $validatedData['product_img'] = $request->file('product_img')->store('product_img');
        }

        $validatedData['total'] = $validatedData['quantity'] * $validatedData['price'];

        // UPDATE STOK
        Stock::where('id', $stock->id)->update($validatedData);

        return redirect()->route('stock.index')->with('success', 'Stok berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    // HAPUS STOK
    public function destroy(Stock $stock)
    {
        // HAPUS FOTO DARI STORAGE
        if($stock->product_img) {
            Storage::delete($stock->product_img);
        }

        Stock::destroy($stock->id);

        return back()->with('success', 'Stok berhasil ditambahkan!');
    }
}
