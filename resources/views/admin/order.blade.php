<!DOCTYPE html>
<html>
<head> 
  @include('admin.css')

</head>

<body>
  @include('admin.header')
  @include('admin.sidebar')

  <div class="page-content">
    <div class="page-header">
      <div class="container-fluid">
        <h2>View Orders</h2>
      </div>
    </div>

    <div class="container mt-4 mb-5">
      <div class="row justify-content-center">
        <div class="col-md-12 table-container">
          <table class="table table-bordered table-striped text-center align-middle">
            <thead class="table-dark">
              <tr>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Status</th>
                <th>Change Status</th>
                <th>Print PDF</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $datas)
              <tr>
                <td>{{ $datas->name }}</td>
                <td>{{ $datas->rec_address }}</td>
                <td>{{ $datas->product->title }}</td>
                <td>{{ $datas->product->price }}</td>
                <td>
                  <img src="{{ asset('products/' . $datas->product->image) }}" alt="Product Image">
                </td>
                <td>
                  @if ($datas->status == 'in progress')
                    <span class="status-danger">{{ $datas->status }}</span>
                  @elseif ($datas->status == 'On The Way')
                    <span class="status-warning">{{ $datas->status }}</span>
                  @else
                    <span class="status-success">{{ $datas->status }}</span>
                  @endif
                </td>
                <td>
                  <a href="{{ url('on_the_way', $datas->id) }}" class="btn btn-outline-warning btn-sm mb-1">On The Way</a>
                  <a href="{{ url('order_deliverd', $datas->id) }}" class="btn btn-outline-success btn-sm">Delivered</a>
                </td>
                <td>
                  <a href="{{ url('print_pdf',$datas->id) }}" class="btn btn-outline-secondary btn-sm">Print PDF</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
           <div class="d-flex justify-content-center mt-3">
                      {{ $data->links() }}
             </div>
        </div>
      </div>
    </div>
  </div>

  @include('admin.footer')
</body>
</html>
