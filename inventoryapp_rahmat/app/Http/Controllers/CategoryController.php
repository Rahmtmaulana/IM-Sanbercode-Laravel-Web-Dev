<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function create()
    {
        return view('category.tambah');
    }

 public function store(Request $request){
    $request->validate([
        'name' => 'required|min:5',
        'description' => 'required',
    ], [
        'required' => 'Inputan :attribute wajib diisi',
        'min' => 'Inputan :attribute minimal 5 karakter'
    ]);

    $now = Carbon::now();

    DB::table('categories')->insert([
        'name' => $request->input('name'), 
        'description' => $request->input('description'),
        'created_at' => $now,
        'updated_at' => now()
    ]);

    return redirect('/category')->with('success', 'Data berhasil ditambahkan');
}

public function index()
{
    $categories = \DB::table('categories')->get();
    return view('category.index', compact('categories'));
}

public function show($id)
{
    $category = DB::table('categories')->where('id', $id)->first();
    return view('category.show', compact('category'));
}

public function edit($id)
{
    $category = DB::table('categories')->where('id', $id)->first();
    return view('category.edit', compact('category'));
}

public function update(Request $request, $id)
{
    DB::table('categories')->where('id', $id)->update([
        'name' => $request->name,
        'description' => $request->description,
        'updated_at' => now()
    ]);

    return redirect('/category');
}

public function destroy($id)
{
    DB::table('categories')->where('id', $id)->delete();
    return redirect('/category');
}


}


