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
    // HALAMAN PENJUALAN
    public function index()
    {
        $sales = Sale::orderBy('date')->get()->groupBy('date');
        return view('penjualan', [
            'sales' => $sales,
            'sum' => Sale::all()->sum('total')
        ]);

        // dd($sales);
        // return view('penjualan', compact('sales'));
        // $sale = Sale::all();
        // return view('penjualan', [
        //     'sales' => $sale,
        //     'sum' => $sale->sum('total')
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // HALAMAN TAMBAH PENJUALAN
    public function create()
    {
        $stocks = Stock::all();

        return view('create_penjualan', compact('stocks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // MENYIMPAN PENJUALAN
    public function store(Request $request)
    {
        // CUSTOM MESSAGE
        $message = [
            'required' => ':attribute harus diisi',
            'regex' => ':attribute tidak sesuai',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter'
        ];

        // VALIDASI
        $validatedData = $request->validate([
            'date' => 'required|before:tomorrow',
            'stock_id' => 'required',
            'stock_sold' => 'required|regex:/^[0-9]+$/|not_in:0',
        ], $message);

        $barang = Stock::where('id', $request->stock_id)->first();

        $validatedData['total'] = $validatedData['stock_sold'] * $barang->price;

        // JIKA QUANTITY STOK LEBIH BESAR SAMADENGAN QUANTITY YANG DIINPUT
        if($barang->quantity >= $request->stock_sold) {
            $newquantity = $barang->quantity - $request->stock_sold;
            // UPDATE QUANTITY DAN TOTAL HARGA STOK
            $barang->update([
                'quantity' => $newquantity,
                'total' => $newquantity * $barang->price
            ]);

            Sale::create($validatedData);
            return redirect()->route('penjualan.index')->with('success', 'Data berhasil ditambahkan!');
        }
        else {
            // toastr()->error('Oops! Quantity melebihi stock yang tersedia');
            return back()->with('error', 'Quantity melebihi stock yang tersedia');
        }

        // dd($price);
        // dd($validatedData);


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
    // HALAMAN EDIT PENJUALAN
    public function edit(Sale $sale, $id)
    {
        $sales = Sale::find($id);
        // dd($sales);
        return view('edit_sale', [
            "stocks" => Stock::all(),
            "sales" => $sales
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // UPDATE PENJUALAN
    public function update(Request $request, Sale $sale, $id)
    {
        // CUSTOM MESSAGE
        $message = [
            'required' => ':attribute harus diisi',
            'regex' => ':attribute tidak sesuai',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter'
        ];

        // VALIDASI
        $validatedData = $request->validate([
            'date' => 'required|before:tomorrow',
            'stock_id' => 'required',
            'stock_sold' => 'required|regex:/^[0-9]+$/|not_in:0',
        ], $message);

        $barang = Stock::where('id', $request->stock_id)->first();

        $validatedData['total'] = $validatedData['stock_sold'] * $barang->price;

        // JIKA TOTAL QUANTITY STOK LEBIH BANYAK SAMADENGAN QUANTITY YANG DIINPUT
        if(($barang->quantity + $request->old_stock) >= $request->stock_sold) {
            // JIKA PRODUCT SEBELUMNYA TIDAK DIIUBAH ATAU SAMA DENGAN PRODUCT YANG DIINPUT
            if($request->old_stockid == $validatedData['stock_id']) {
                // JIKA QUANTITY SEBELUMNYA LEBIH BANYAK DIBANDING QUANTITY YANG DIINPUT
                if($request->old_stock > $validatedData['stock_sold']) {
                    $itung = ($request->old_stock - $validatedData['stock_sold']) + $barang->quantity;
                    // UPDATE STOK QUANTITY DAN TOTAL
                    $barang->update([
                        'quantity' => $itung,
                        'total' => $itung * $barang->price
                    ]);
                } // JIKA QUANTITY SEBELUMNYA LEBIH SEDIKIT DIBANDINGKAN QUANTITY YANG DIINPUT
                elseif($request->old_stock < $validatedData['stock_sold']) {
                    $itung = $barang->quantity - ($validatedData['stock_sold'] - $request->old_stock);
                    // UPDATE STOK QUANTITY DAN TOTAL
                    $barang->update([
                        'quantity' => $itung,
                        'total' => $itung * $barang->price
                    ]);
                }
            } // JIKA PRODUCT YANG DIINPUTKAN TIDAK SAMA DENGAN ATAU DIUBAH DARI PRODUCT SEBELUMNYAC (DIUBAH)
            elseif($request->old_stockid != $validatedData['stock_id']) {
                $oldbarang = Stock::where('id', $request->old_stockid)->first();
                $oldstock = $oldbarang->quantity + $request->old_stock;
                $newstock = $barang->quantity - $request->stock_sold;

                // UPDATE QUANTITY STOK SEBELUMNYA
                $oldbarang->update([
                    'quantity' => $oldstock,
                    'total' => $oldstock * $oldbarang->price
                ]);

                // UPDATE QUANTITY STOK BARU
                $barang->update([
                    'quantity' => $newstock,
                    'total' => $newstock * $barang->price
                ]);
            }

            // UPDATE
            Sale::where('id', $id)->update($validatedData);

            return redirect()->route('penjualan.index')->with('success', 'Data berhasil diubah!');
        } // JIKA QUANTITY YANG DIINPUTKAN LEBIH BESAR DIBANDING TOTAL STOK
        else {
            // toastr()->error('Oops! Quantity melebihi stock yang tersedia');
            return back()->with('error', 'Quantity melebihi stock yang tersedia');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    // HAPUS PENJUALAN
    public function destroy(Sale $sale, $id)
    {
        $sale = Sale::find($id);

        $barang = Stock::where('id', $sale->stock_id)->first();

        $quantity = $barang->quantity + $sale->stock_sold;

        // UPDATE QUANTITY DAN TOTAL TABEL STOCK
        $barang->update([
            'quantity' => $quantity,
            'total' => $quantity * $barang->price
        ]);

        // HAPUS PENJUALAN DARI DATABASE
        $sale->delete();

        return back()->with('success', 'Data berhasil dihapus!');
    }
}
