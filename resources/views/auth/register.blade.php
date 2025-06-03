<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register | E-Comm</title>
  <link rel="stylesheet" href="{{ asset('ecomtemp/css/bootstrap.css') }}">
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
      max-width: 500px;
      color: #fff;
    }

    .glass-box h2 {
      text-align: center;
      margin-bottom: 20px;
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

    label {
      margin-bottom: 5px;
      font-weight: 500;
      color: #055160;
    }

    .text-danger {
      font-size: 0.85rem;
    }

    .login-link {
      display: block;
      margin-top: 10px;
      text-align: right;
      font-size: 0.9rem;
      color: #055160;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="glass-box">
    <h2>Register</h2>

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="form-group mb-3">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required autofocus value="{{ old('name') }}">
        @error('name')
          <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group mb-3">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required value="{{ old('email') }}">
        @error('email')
          <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group mb-3">
        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" required value="{{ old('phone') }}">
        @error('phone')
          <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group mb-3">
        <label for="address">Address</label>
        <input type="text" id="address" name="address" class="form-control" placeholder="Enter your address" required value="{{ old('address') }}">
        @error('address')
          <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group mb-3">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Create a password" required>
        @error('password')
          <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group mb-3">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm your password" required>
        @error('password_confirmation')
          <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
      </div>

      <a href="{{ route('login') }}" class="login-link">Already have an account?</a>

      <button type="submit" class="btn-glass mt-3">Register</button>
    </form>
  </div>
</body>
</html>
