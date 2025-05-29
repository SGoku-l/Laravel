<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        .cata {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }
        input[type='text'] {
            padding: 8px;
            border-radius: 5px;
            border: none;
        }
        img {
            max-width: 100%;
            height: auto;
        }
    </style>

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
          <div class="col-md-12">
            <table class="table table-bordered table-striped text-center align-middle">
              <thead class="table-dark">
                <t>
                  <th>Customer Name</th>
                  <th>Address</th>
                  <th>Product Title</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Change Status</th>
                  <th>Print Pdf</th>
                </t>
              </thead>
              <tbody>
                @foreach ($data as $datas)
                <tr>
                  <td>{{ $datas->name }}</td>
                  <td>{{ $datas->rec_address }}</td>
                  <td>{{ $datas->product->title }}</td>
                  <td>{{ $datas->product->price }}</td>
                  <td>
                    <img src="{{ asset('products/' . $datas->product->image) }}" alt="Product Image" height="100" width="100">
                  </td>
                  <td>
                    @if ($datas->status == 'in progress')
                      <span class="text-danger">{{ $datas->status }}</span>
                    @elseif ($datas->status == 'On The Way')
                      <span class="text-warning">{{ $datas->status }}</span>
                    @else
                      <span class="text-success">{{ $datas->status }}</span>
                    @endif
                  </td>
                  <td>
                    <a href="{{ url('on_the_way', $datas->id) }}" class="btn btn-danger btn-sm mb-1">On The Way</a>
                    <a href="{{ url('order_deliverd', $datas->id) }}" class="btn btn-success btn-sm">Delivered</a>
                  </td>
                  <td>
                    <a href="{{ url('print_pdf',$datas->id) }}" class="btn btn-secondary">Print Pdf</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    @include('admin.footer')
  </body>
</html>
