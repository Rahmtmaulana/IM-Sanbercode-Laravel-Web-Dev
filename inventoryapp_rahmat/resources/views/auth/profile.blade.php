@extends('layouts.master')

@section('judul')
@endsection

@section('content')

<div class="card p-4" style="max-width:900px; margin-left:0;">
    <h4 class="mb-3">Buat Profile</h4>

    <form action="/profile/update" method="POST">
    @csrf

    

    <div class="mb-3">
        <label>Age</label>
        <input type="number" name="age" value="{{ $user->age }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Biodata</label>
        <textarea name="biodata" class="form-control">{{ $user->biodata }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

{{-- ALERT --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session('success') }}',
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif

@endsection