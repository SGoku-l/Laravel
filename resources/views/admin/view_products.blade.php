<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        .cata {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        input[type='text'] {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        form{
          display: flex;
          justify-content: center;
          align-items: center;
          gap: 1rem;
        }
        form input{
          border: none;
          padding: 10px;
          border-radius: 5px;
        }
        
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h2 class="mb-4">View Products</h2>
          <h5 style="margin-top: 10px;"><a href="{{ url('add_products') }}" style="text-decoration: none;"> <i class="fa fa-long-arrow-left"></i> Add Product </a></h5>

          <form action="{{ url('product_search') }}" method="get">
            <input type="search" name="search" value="{{ @$search }}">
            <button type="submit" class="btn btn-secondard but">Search</button>
          </form>
          
        </div>
      </div>

      <div class="container mt-5 mb-4">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <table class="table table-bordered table-striped text-center align-middle">
              <thead class="table-dark">
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
                  <td>{!!Str::limit($datas->description,'50')   !!}</td>
                  <td>{{ $datas->price }}</td>
                  <td>{{ $datas->quantity }}</td>
                  <td>{{ $datas->catagory }}</td>
                  <td>
                    <img src="products/{{ $datas->image }}" alt="" height="120" width="150">
                  </td>
                  <td><a href="{{ url('edit_productsget/'.$datas->id) }}" class="btn btn-sm btn-primary">Edit</a></td>
                  <td><a href="{{ url('delete_products/'.$datas->slug) }}" class="btn btn-sm btn-danger">Delete</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div style=" display: flex; justify-content: center; align-items: center; ">
        {{ $list->links() }}
       
      </div>

    </div>

    @include('admin.footer')
  </body>
</html>
