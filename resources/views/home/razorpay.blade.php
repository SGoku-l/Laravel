<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Razorpay Payment Gateway Integration</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 16px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            padding: 30px;
            color: #000;
            width: 100%;
            max-width: 500px;
        }

        .glass-card h3 {
            font-weight: 600;
            text-align: center;
            margin-bottom: 25px;
        }

        .glass-card input[type="text"] {
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 10px;
            width: 100%;
        }

        .razorpay-payment-button {
            margin-top: 20px;
            background-color:rgb(32, 130, 94) !important;
            color: #fff !important;
            border-radius: 8px !important;
            width: 100% !important;
            padding: 12px 0 !important;
            font-weight: bold;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <div class="glass-card">
        <h3 style="color: #055160; font-weight: 700;">Pay Your Bill</h3>

        <form action="{{ route('razorpay.payment.store', $value) }}" method="POST">
            @csrf

            <input type="text" name="name" value="{{ Auth::user()->name }}" readonly>
            <input type="text" name="email" value="{{ Auth::user()->email }}" readonly>
            <input type="text" name="phone" value="{{ Auth::user()->phone }}" readonly>

            <script src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="{{ env('RAZORPAY_KEY') }}"
                data-amount="{{ $value * 100 }}"
                data-buttontext="Pay ₹{{ $value }}"
                data-name="WMP Creative Agency"
                data-description="Test Pay"
                data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png"
                data-prefill.name="{{ Auth::user()->name }}"
                data-prefill.email="{{ Auth::user()->email }}"
                data-prefill.contact="{{ Auth::user()->phone }}"
                data-theme.color="#ff7529">
            </script>
        </form>
    </div>

</body>
</html>
