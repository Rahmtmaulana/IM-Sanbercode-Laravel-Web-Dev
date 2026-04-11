@extends('layouts.master')
@section('judul')
  Tampil Category
@endsection
@section('content')

<a href="/category/create" class="btn btn-primary btn-sm my-2">Tambah</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Action</th>
     
    </tr>
  </thead>
 <tbody>
    @forelse ($categories as $item)
    <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $item->name }}</td>
        <td>
            <!-- Detail -->
            <a href="/category/{{ $item->id }}" class="btn btn-sm btn-info">Detail</a>

            <!-- Edit -->
            <a href="/category/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

            <!-- Delete -->
            <form action="/category/{{ $item->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="3" class="text-center">Data tidak ada</td>
    </tr>
    @endforelse
</tbody>
</table>

@endsection


