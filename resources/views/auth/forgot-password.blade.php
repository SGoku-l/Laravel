<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Forgot Password | E-Comm</title>
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
      max-width: 450px;
      color: #fff;
    }

    .glass-box h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #055160;
    }

    .description {
      font-size: 0.95rem;
      color: #055160;
      margin-bottom: 20px;
      text-align: center;
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

    .text-danger {
      font-size: 0.85rem;
    }

    label {
      margin-bottom: 5px;
      font-weight: 500;
      color: #055160;
    }
  </style>
</head>
<body>
  <div class="glass-box">
    <h2>Reset Password</h2>
    
    <div class="description">
      Forgot your password? No problem. Just enter your email address and we’ll email you a password reset link.
    </div>

    @if(session('status'))
      <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
      @csrf

      <div class="form-group mb-3">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required value="{{ old('email') }}">
        @error('email')
          <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn-glass mt-3">Email Password Reset Link</button>
    </form>
  </div>
</body>
</html>
