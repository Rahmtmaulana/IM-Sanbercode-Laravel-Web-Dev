@extends('layouts.master')
@section('judul')
@endsection
@section('content')

<div class="container mt-4">
    <h4>Tampil Transaction</h4>

    <a href="{{ route('transaction.create') }}" class="btn btn-primary mb-3">
        Input Transaction
    </a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $t)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $t->name }}</td>
                <td>{{ $t->product->name }}</td>
                <td>{{ $t->qty }}</td>
                <td>{{ $t->type }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection