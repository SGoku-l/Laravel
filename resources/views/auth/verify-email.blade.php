<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Email Verification | E-Comm</title>
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
      max-width: 500px;
      color: #fff;
      text-align: center;
    }

    .glass-box h2 {
      color: #055160;
      margin-bottom: 20px;
    }

    .message {
      font-size: 0.95rem;
      color: #055160;
      margin-bottom: 20px;
    }

    .alert {
      padding: 10px;
      border-radius: 5px;
      font-size: 0.9rem;
      margin-bottom: 15px;
    }

    .alert-success {
      background-color: rgba(46, 204, 113, 0.2);
      color: #2ecc71;
    }

    .btn-glass {
      background: #8ec5fc;
      border: none;
      color: #fff;
      padding: 10px 20px;
      border-radius: 10px;
      transition: 0.3s;
      margin-right: 10px;
    }

    .btn-glass:hover {
      background: rgba(255, 255, 255, 0.5);
      color: #055160;
    }

    .btn-link {
      background: none;
      border: none;
      color: #055160;
      text-decoration: underline;
      font-size: 0.9rem;
    }

    .btn-link:hover {
      color: #000;
    }
  </style>
</head>
<body>
  <div class="glass-box">
    <h2>Verify Your Email</h2>

    <div class="message">
      Thanks for signing up! Please verify your email address by clicking on the link we just emailed to you.
      <br>
      If you didn't receive the email, we’ll send another.
    </div>

    @if (session('status') == 'verification-link-sent')
      <div class="alert alert-success">
        A new verification link has been sent to the email address you provided.
      </div>
    @endif

    <div class="d-flex justify-content-center">
      <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn-glass">Resend Verification Email</button>
      </form>

      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn-link">Log Out</button>
      </form>
    </div>
  </div>
</body>
</html>
>
