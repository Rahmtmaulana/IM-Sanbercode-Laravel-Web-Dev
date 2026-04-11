@extends('layouts.master')

@section('content')
<div class="container">

    <h4 class="mb-4">Product</h4>

    <!-- Button admin -->
    @auth
        @if(auth()->user()->role == 'admin')
            <a href="{{ route('product.create') }}" class="btn btn-primary mb-4">
                + Add Product
            </a>
        @endif
    @endauth

    <!-- Alert -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @forelse($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">

                <!-- IMAGE -->
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         class="card-img-top"
                         style="height:250px; object-fit:cover;">
                @endif

                <div class="card-body">

                    <!-- CATEGORY -->
                    <span class="badge bg-primary mb-2">
                        {{ $product->category_name ?? '-' }}
                    </span>

                    <!-- NAME -->
                    <h5 class="card-title">
                        {{ $product->name }}
                    </h5>

                    <!-- PRICE -->
                    <h6 class="text-primary">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </h6>

                    <!-- STOCK -->
                    <p class="text-muted">
                        Jumlah Stock: {{ $product->stock }}
                    </p>

                    <!-- DESC -->
                    <p class="text-muted small">
                        {{ Str::limit($product->description, 80) }}
                    </p>

                </div>

                <div class="card-footer bg-white border-0">

                    <!-- Semua user -->
                    <a href="{{ route('product.show', $product->id) }}"
                       class="btn btn-primary w-100 mb-2">
                        Read More
                    </a>

                    <!-- Admin only -->
                    @auth
                        @if(auth()->user()->role == 'admin')

                       <div class="d-flex gap-2">

    <a href="{{ route('product.edit', $product->id) }}"
       class="btn btn-warning w-50">
        Edit
    </a>

    <form action="{{ route('product.destroy', $product->id) }}"
          method="POST" class="w-50">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger w-100"
            onclick="return confirm('Yakin hapus?')">
            Delete
        </button>
    </form>

</div>

                        @endif
                    @endauth

                </div>

            </div>
        </div>
        @empty
            <p>Data kosong</p>
        @endforelse
    </div>

</div>
@endsection