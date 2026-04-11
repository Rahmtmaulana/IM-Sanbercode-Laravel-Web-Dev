<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="{{asset('template/src/assets/css/styles.min.css')}}">
</head>

<body style="background:#eef2ff;">

<div class="d-flex justify-content-center align-items-center vh-100">

    <div class="card p-4 shadow" style="width:350px; border-radius:15px;">

        <div class="text-center mb-3">
            <h4 class="fw-bold">SEODash</h4>
            <p>Login</p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <button class="btn w-100"
                style="background:#3b5bdb; color:white; border-radius:20px;">
                Submit
            </button>

        </form>

        <div class="text-center mt-3">
            <small>Don't have an account? <a href="/register">Create Account</a></small>
        </div>

    </div>

</div>

</body>
</html>