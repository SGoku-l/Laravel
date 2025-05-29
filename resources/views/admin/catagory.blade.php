<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        .cata{
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }
        input[type='text']{
            padding: 8px;
            border-radius: 5px;
            border: none;

        }
    </style>

  </head>
  <body>
    @include('admin.header')

   @include('admin.sidebar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <h2>Add Catagory</h2>

            <div>
                <div class="cata">
                    <form action="{{ url('add_catagory') }}" method="post">
                        @csrf
                    <input type="text" name="catagory" >
                    <button class="btn btn-primary">Add Catagory</button>

                    </form>
                </div>
            </div>
          </div>
        </div>
       
        <div class="container mt-4" style="margin-bottom: 20px; ">
            <div class="row justify-content-center">
              <div class="col-md-6">
                <table class="table table-bordered table-striped text-center">
                  <thead class="table-dark">
                    <tr>
                      <th>Category Name</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  @foreach ($data as $datas)
                  <tbody>
                    <tr>
                      <td>{{ $datas->catagory_name }}</td>
                      <td><a href="{{ url('edit_catagory/'.$datas->id) }}" class="btn btn-sm btn-primary">Edit</a></td>
                      <td><a href="{{ url('delete_catagory/'.$datas->id) }}" class="btn btn-sm btn-danger">Deleted</a></td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>
              </div>
            </div>
          </div>

       </div> 
        

@include('admin.footer')        