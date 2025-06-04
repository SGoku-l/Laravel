<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | E-Comm</title>
  <link rel="stylesheet" href="{{ asset('ecomtemp/css/bootstrap.css') }}">
  <link rel="shortcut icon" href="{{ asset('ecomtemp/images/shopping-cart.png') }}" type="image/x-icon">
  <style>
    body {
      background-image: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
    }

    .glass-box {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 16px;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
      padding: 30px;
      width: 100%;
      max-width: 400px;
      color: #fff;
    }

    .glass-box h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #055160;
    }

    .form-control {
      background: rgba(255, 255, 255, 0.2);
      border: none;
      color: #fff;
    }

    .form-control::placeholder {
      color: gray;
    }

    .form-control:focus {
      background: rgba(255, 255, 255, 0.3);
      box-shadow: none;
      color: black;
    }

    .btn-glass {
      background: #8ec5fc;
      border: none;
      color: #fff;
      width: 100%;
      padding: 10px;
      border-radius: 10px;
      transition: 0.3s;
    }

    .btn-glass:hover {
      background: rgba(255, 255, 255, 0.5);
      color: #055160;
    }

    .forgot-link,
    .register-link {
      font-size: 0.9rem;
      color: #055160;
      text-decoration: none;
    }

    .links-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 10px;
    }

    label {
      margin-bottom: 5px;
      font-weight: 500;
      color: #055160;
    }

    .form-check-label {
      margin-left: 5px;
    }

    .text-danger {
      font-size: 0.85rem;
    }
  </style>
</head>
<body>
  <div class="glass-box">
    <h2>Login</h2>

    @if(session('status'))
      <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="form-group mb-3">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required autofocus>
        @error('email')
          <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group mb-3">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
        @error('password')
          <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group form-check mb-3 d-flex align-items-center">
        <input type="checkbox" class="form-check-input" id="remember" name="remember">
        <label class="form-check-label" for="remember">Remember me</label>
      </div>

      <div class="links-row">
        <a href="{{ route('password.request') }}" class="forgot-link">Forgot password?</a>
        <a href="{{ route('register') }}" class="register-link">Create account</a>
      </div>

      <button type="submit" class="btn-glass mt-4">Log In</button>
    </form>
  </div>
</body>
</html>
