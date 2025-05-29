<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Invoice</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 40px;
      background-color: #f5f5f5;
    }
    .invoice-box {
      background: #fff;
      padding: 30px;
      border: 1px solid #eee;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
      max-width: 800px;
      margin: auto;
    }
    h1 {
      font-size: 24px;
      margin-bottom: 20px;
    }
    .invoice-header {
      display: flex;
      justify-content: space-between;
      margin-bottom: 30px;
    }
    .invoice-details {
      margin-bottom: 20px;
    }
    .invoice-details div {
      margin-bottom: 5px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    table th, table td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: left;
    }
    table th {
      background-color: #f0f0f0;
    }
    .total {
      text-align: right;
      font-size: 18px;
      font-weight: bold;
    }
    .footer {
      text-align: center;
      font-size: 12px;
      color: #777;
      margin-top: 30px;
    }
  </style>
</head>
<body>
  <div class="invoice-box">
    <h1>Invoice</h1>

    <div class="invoice-header">
      <div>
        <strong>From:</strong><br>
        WMP Creative Agency<br>
        Arts College<br>
       Krishnagiri, 635001<br>
        Phone: +91 6381987483
      </div>
      <div>
        <strong>To:</strong><br>
        {{ $data->name }}<br>
        {{ $data->rec_address }}<br>
       {{ $data->user->email}}
      </div>
    </div>

    <div class="invoice-details">
      <div><strong>Invoice #:</strong> INV-1001</div>
      <div><strong>Date:</strong> May 10, 2025</div>
      <div><strong>Due Date:</strong> May 20, 2025</div>
    </div>

    <table>
      <thead>
        <tr>
          <th>Item</th>
          <th>Description</th>
          <th>Unit Price</th>
          <th>Image</th>
          <th>Amount</th>
        </tr>
      </thead>
      
      <tbody>
        <tr>
          <td>{{ $data->product->title }}</td>
          <td>{{ $data->product->description }}</td>
          <td>{{ $data->product->price }}</td>
          <td>
            <img src="products/{{ $data->product->image }}" alt="" height="150px" >
          </td>
        </tr>
      </tbody>
    </table>

    <div class="total">
      Total: Rs = {{ $data->product->price}}
    </div>

    <div class="footer">
      Thank you for your business!<br>
      This invoice was generated electronically and is valid without a signature.
    </div>
  </div>
</body>
</html>
