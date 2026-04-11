@extends('layouts.master')

@section('judul')
Tambah Product
@endsection

@section('content')

<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Nama Product</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" class="form-control">
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>
<div class="mb-3">
    <label>Harga</label>
    <input type="number" name="price" class="form-control">
</div>

<div class="mb-3">
    <label>Stock</label>
    <input type="number" name="stock" class="form-control">
</div>
    <div class="mb-3">
        <label>Gambar</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>

@endsection