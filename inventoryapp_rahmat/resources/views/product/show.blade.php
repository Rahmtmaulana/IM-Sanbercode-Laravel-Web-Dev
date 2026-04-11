@extends('layouts.master')

@section('content')
<h4>Detail Product</h4>

<p>Nama: {{ $product->name }}</p>
<p>Category: {{ $product->category->name }}</p>
<p>Stock: {{ $product->stock }}</p>
@endsection