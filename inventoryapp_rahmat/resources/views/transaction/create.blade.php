@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="mb-4">Transaction</h4>

        <form action="{{ route('transaction.store') }}" method="POST">
            @csrf

            <!-- Product -->
            <div class="mb-3">
                <label>Product</label>
                <select name="product_id" class="form-control">
                    <option value="">--Select a Product--</option>
                    @foreach($products as $p)
                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Type -->
            <div class="mb-3">
                <label>Type</label>
                <select name="type" class="form-control">
                    <option value="">--Select Type--</option>
                    <option value="in">Product Masuk</option>
                    <option value="out">Product Keluar</option>
                </select>
            </div>

            <!-- Amount -->
            <div class="mb-3">
                <label>Amount</label>
                <input type="number" name="qty" class="form-control">
            </div>

            <!-- Notes -->
            <div class="mb-3">
                <label>Notes</label>
                <textarea name="notes" class="form-control"></textarea>
            </div>

            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection