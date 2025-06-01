<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel - Razorpay Payment Gateway Integration</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>

<div class="container">

    <div class="card mt-5">
        <h3 class="card-header p-3">Laravel 11 Razorpay Payment Gateway Integration </h3>
        <div class="card-body">

            <form action="{{ route('razorpay.payment.store',$value) }}" method="POST" class="text-center">
                @csrf
                <script src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key="{{ env('RAZORPAY_KEY') }}"
                        data-amount="{{ $value * 100 }}"
                        data-buttontext="Pay {{ $value }} INR"
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
    </div>
</div>
</body>
</html>