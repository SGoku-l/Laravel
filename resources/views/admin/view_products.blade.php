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
        <h2 class="mb-4 text-white">View Products</h2>
        <h5>
          <a href="{{ url('add_products') }}">
            <i class="fa fa-long-arrow-left"></i> Add Product
          </a>
        </h5>

        <form class="search-form" action="{{ url('product_search') }}" method="get">
          <input type="search" name="search" value="{{ @$search }}" placeholder="Search products...">
          <button type="submit" class="btn btn-secondary">Search</button>
        </form>
      </div>
    </div>

    <div class="container mt-5 mb-4">
      <div class="row justify-content-center">
        <div class="col-md-12 glass-container">
          <table class="table table-bordered table-striped text-center align-middle">
            <thead>
              <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Product Category</th>
                <th>Product Image</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($list as $datas)
              <tr>
                <td>{{ $datas->title }}</td>
                <td>{!! Str::limit($datas->description, 50) !!}</td>
                <td>{{ $datas->price }}</td>
                <td>{{ $datas->quantity }}</td>
                <td>{{ $datas->catagory }}</td>
                <td><img src="products/{{ $datas->image }}" alt="" height="100" width="120"></td>
                <td><a href="{{ url('edit_productsget/'.$datas->id) }}" class="btn btn-sm btn-outline-primary">Edit</a></td>
                <td><a href="{{ url('delete_products/'.$datas->id) }}" class="btn btn-sm btn-outline-danger">Delete</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
           <div class="d-flex justify-content-center mt-3">
                      {{ $list->links() }}
            </div>
        </div>
      </div>
    </div>
  </div>

  @include('admin.footer')
</body>
</html>
