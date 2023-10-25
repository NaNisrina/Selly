<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengeluaran = Expense::orderBy('date')->get()->groupBy('date');
        $penjualans = Sale::all();
        $pengeluarans = Expense::all();
        return view('pengeluaran', [
            'totalPenjualan' => $penjualans->sum('total'),
            'pengeluarans' => $pengeluaran,
            'totalPengeluaran' => $pengeluarans->sum('total'),
            'kas' => $penjualans->sum('total') - $pengeluarans->sum('total')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
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
            'item' => 'required',
            'quantity' => 'required|regex:/^[0-9]+$/|not_in:0',
            'price' => 'required|regex:/^[1-9][0-9]+$/|not_in:0'
        ], $message);

        $validatedData['total'] = $validatedData['quantity'] * $validatedData['price'];

        // dd($validatedData);
        // SIMPAN
        Expense::create($validatedData);

        return redirect()->route('pengeluaran.index')->with('success', 'Data berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
