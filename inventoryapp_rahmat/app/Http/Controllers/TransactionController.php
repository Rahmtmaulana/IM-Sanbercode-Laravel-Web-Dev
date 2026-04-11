<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('product')->get();
        return view('transaction.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all();
        return view('transaction.create', compact('products'));
    }

   public function store(Request $request)
{
    $product = Product::findOrFail($request->product_id);

    // LOGIC STOK
    if ($request->type == 'in') {
        $product->stock += $request->qty;
    } else {
        // cek kalau stok cukup
        if ($product->stock < $request->qty) {
            return back()->with('error', 'Stok tidak cukup!');
        }
        $product->stock -= $request->qty;
    }

    // simpan perubahan stok
    $product->save();

    // simpan transaksi
    Transaction::create($request->all());

    return redirect('/transaction')->with('success', 'Berhasil tambah transaksi');
}
}