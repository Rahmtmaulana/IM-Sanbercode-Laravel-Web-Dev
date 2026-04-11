<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Create Account</title>
  <link rel="stylesheet" href="{{asset('template/src/assets/css/styles.min.css')}}">
</head>

<body style="background:#eef2ff;">

<div class="d-flex justify-content-center align-items-center vh-100">

    <div class="card p-4 shadow" style="width:350px; border-radius:15px;">

        <div class="text-center mb-3">
            <h4 class="fw-bold">Create Account</h4>
        </div>

        {{-- SUCCESS --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- ERROR --}}
        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="/register">
            @csrf

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
    <label>Confirm Password</label>
    <input type="password" name="password_confirmation" class="form-control">
</div>

            <button class="btn w-100"
                style="background:#3b5bdb; color:white; border-radius:20px;">
                Register
            </button>

        </form>

        <div class="text-center mt-3">
            <small>Already have account? <a href="/login">Login</a></small>
        </div>

    </div>

</div>

</body>
</html>