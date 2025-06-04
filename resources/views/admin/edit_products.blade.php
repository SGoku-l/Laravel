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
          <h2 style="color: white;">Update Product</h2>
          <h5 style="margin-top: 10px;">
            <a href="{{ url('view_products') }}" style="text-decoration: none; color: #17a2b8;">
              <i class="fa fa-long-arrow-left"></i> View Products
            </a>
          </h5>
        </div>
      </div>

      <div class="container">
        <div class="update-product-form">
          <form action="{{ url('update_products', $data->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <label for="product_title">Product Title</label>
            <input type="text" id="product_title" name="title" value="{{ $data->title }}" placeholder="Enter Product Name">

            <label for="product_description">Description</label>
            <textarea name="description" id="product_description" rows="3" placeholder="Enter Product Description">{{ $data->description }}</textarea>

            <label for="product_price">Price</label>
            <input type="text" id="product_price" name="price" value="{{ $data->price }}" placeholder="Enter Price">

            <label for="product_quantity">Quantity</label>
            <input type="text" id="product_quantity" name="quantity" value="{{ $data->quantity }}" placeholder="Enter Quantity">

            <label for="product_category">Product Category</label>
            <input type="text" id="product_category" name="pcatagory" value="{{ $data->catagory }}" placeholder="Category">

            <label>Current Product Image</label>
            <img src="{{ asset('products/' . $data->image) }}" alt="Product Image" class="current-img" height="120" width="120">

            <label for="product_image">Upload New Image</label>
            <input type="file" name="pimage" id="product_image">

            <button class="submit-btn">Update Product</button>
          </form>
        </div>
      </div>
    </div>

    @include('admin.footer')
  </body>
</html>
