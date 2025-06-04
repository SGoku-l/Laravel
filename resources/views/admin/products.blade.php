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
          <h2 style="color: white;">Add Product</h2>
          <h5 style="margin-top: 10px;">
            <a href="{{ url('view_products') }}" style="text-decoration: none; color: #17a2b8;">View Products <i class="fa fa-long-arrow-right"></i></a>
          </h5>
        </div>
      </div>

      <div class="container">
        <div class="product-form-wrapper">
          <form action="{{ url('upload_products') }}" method="post" enctype="multipart/form-data">
            @csrf

            <label for="product_title">Product Title</label>
            <input type="text" id="product_title" name="title" placeholder="Enter Product Name">

            <label for="product_description">Description</label>
            <textarea name="description" id="product_description" rows="3" placeholder="Enter Product Description"></textarea>

            <label for="product_price">Price</label>
            <input type="text" id="product_price" name="price" placeholder="Enter Price">

            <label for="product_quantity">Quantity</label>
            <input type="text" id="product_quantity" name="quantity" placeholder="Enter Quantity">

            <label for="product_category">Product Category</label>
            <select name="pcatagory" id="product_category">
              <option disabled selected>Select Product</option>
              @foreach ($data as $datas)
              <option value="{{ $datas->catagory_name }}">{{ $datas->catagory_name }}</option>
              @endforeach
            </select>

            <label for="product_image">Product Image</label>
            <input type="file" name="pimage" id="product_image">

            <button class="submit-btn">Add Product</button>
          </form>
        </div>
      </div>
    </div>

    @include('admin.footer')
  </body>
</html>
