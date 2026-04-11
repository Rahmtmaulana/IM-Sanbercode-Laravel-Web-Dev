@extends('layouts.master')

@section('judul')
Edit Product
@endsection

@section('content')

<form action="/product/{{ $product->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Product</label>
        <input type="text" name="name" value="{{ $product->name }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control">{{ $product->description }}</textarea>
    </div>

    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" class="form-control">
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Gambar</label>
        <input type="file" name="image" class="form-control">

        @if($product->image)
            <img src="{{ asset('storage/'.$product->image) }}" width="100" class="mt-2">
        @endif
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection