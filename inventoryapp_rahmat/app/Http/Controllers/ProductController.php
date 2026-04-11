<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
   public function show($id)
{
    $product = Product::with('category')->findOrFail($id);
    return view('product.show', compact('product'));
}

    public function index()
    {
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->get();

        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        DB::table('products')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/product')->with('success', 'Product berhasil ditambahkan');
    }

    public function edit($id)
    {
        if (auth()->user()->role != 'admin') {
    abort(403);
}
        $product = DB::table('products')->find($id);
        $categories = DB::table('categories')->get();

        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'updated_at' => now()
        ];

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        DB::table('products')->where('id', $id)->update($data);

        return redirect()->route('product.index')
            ->with('success', 'Data berhasil diupdate!');
    }
    public function category()
{
    return $this->belongsTo(Category::class);
}

    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();

        return redirect()->route('product.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}