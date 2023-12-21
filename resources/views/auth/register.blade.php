<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<main class="d-flex align-items-center justify-content-center flex-column" style="min-height: 100vh;">
        <form class="form-signin w-25" action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="username" name="username"
                    value="{{ old('username') }}">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mt-2">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                    name="email" value="{{ old('email') }}">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mt-2">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password"
                    value="{{ old('password') }}">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating mt-2">
                <input type="password" class="form-control" id="floatingPassword" placeholder="confirmPassword"
                    name="password_confirmation">
                <label for="floatingPassword">Konfirmasi Password</label>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 my-3" type="submit">Sign Up</button>
        </form>

        <p style="font-size: 14px">Sudah punya akun? <a href="{{ route('login') }}"
                class="text-primary fw-semibold text-decoration-none">Masuk</a>
        </p>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
