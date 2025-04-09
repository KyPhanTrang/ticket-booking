<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome CSS (cho icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-container h2 {
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .error-message {
            color: red;
            font-size: 13px;
            font-style: italic;
        }
    </style>
</head>
@if (session('error-login'))
    <div id="custom-toast" class="toast align-items-center text-white bg-danger position-fixed top-0 end-0 m-3"
        role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 9999; min-width: 250px;">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('error-login') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
@endif

<body>
    <div class="row d-flex justify-content-center w-100">
        <div class="login-container">
            <h2>Login</h2>
            <form id="loginForm" method="post" role="form" action="{{ route('auth.login') }}">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Tài khoản</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" id="username" name="email" placeholder="email"
                            value="{{ old('email') }}">
                    </div>
                    @if ($errors->has('email'))
                        <span class="error-message">
                            *{{ $errors->first('email') }}
                        </span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="password">
                    </div>
                    @if ($errors->has('password'))
                        <span class="error-message">
                            *{{ $errors->first('password') }}
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-2">Đăng nhập</button>
                <a href="{{ route('homes.index') }}" class="btn btn-secondary w-100"><i class="fas fa-arrow-left"></i>
                    Quay lại</a>
            </form>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var toastEl = document.getElementById('custom-toast');
        if (toastEl) {
            var toast = new bootstrap.Toast(toastEl, {
                delay: 3000
            });
            toast.show();
        }
    });
</script>

</html>
