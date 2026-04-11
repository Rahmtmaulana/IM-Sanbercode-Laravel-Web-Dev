@extends('layouts.master')

@section('content')
<h3>Detail Category</h3>
<p>Nama: {{ $category->name }}</p>
<p>Description: {{ $category->description }}</p>
<a href="/category">Kembali</a>
@endsection