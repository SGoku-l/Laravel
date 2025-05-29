<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
      .cata {
        margin: auto;
        background-color: black;
        width: 400px;
        max-width: 600px;
        padding: 30px;
        border-radius: 8px;
        margin-bottom: 30px;
      }

      .cata label {
        margin-top: 15px;
        color: whitesmoke;
        font-weight: 600;
      }

      .cata input[type='text'],
      .cata textarea,
      .cata select,
      .cata input[type='file'] {
        margin-top: 5px;
        padding: 10px;
        border-radius: 5px;
        border: none;
        width: 100%;
      }

      .cata .btn {
        margin-top: 25px;
        width: 100%;
      }
      .cata ::placeholder{
        color: black;
      }
      .cata select option {
        color: black;
      }
    </style>
  </head>

  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h2>Add Product</h2>
          <h5 style="margin-top: 10px;"><a href="{{ url('view_products') }}" style="text-decoration: none;"> View Products  <i class="fa fa-long-arrow-right"></i></a></h5>
        </div>
      </div>

      <div class="container">
        <div class="cata">
          <form action="{{ url('upload_products') }}" method="post" enctype="multipart/form-data">
            @csrf

            <label for="title">Product Title</label>
            <input type="text" name="title" class="form-control bg-white" placeholder="Enter Product Name">

            <label for="description">Description</label>
            <textarea name="description" class="form-control bg-white" id="description" placeholder="Enter Product Description"></textarea>

            <label for="price">Price</label>
            <input type="text" name="price" class="form-control bg-white" placeholder="Enter Price" id="price">

            <label for="quantity">Quantity</label>
            <input type="text" name="quantity" class="form-control bg-white" placeholder="Enter Quantity" id="quantity">

            <label for="pcatagory">Product Category</label>
            <select name="pcatagory" class="form-control bg-white" id="pcatagory">
              <option >Select Product</option>
              @foreach ($data as $datas)
              <option value="{{ $datas->catagory_name }}">{{ $datas->catagory_name }}</option>
              @endforeach
            </select>

            <label for="pimage">Product Image</label>
            <input type="file" class="form-control bg-white" name="pimage" id="pimage">

            <button class="btn btn-success">Add Product</button>
          </form>
        </div>
      </div>
    </div>

    @include('admin.footer')
  </body>
</html>
