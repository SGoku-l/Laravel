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
        .edit{
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

  </head>
  <body>
    @include('admin.header')

   @include('admin.sidebar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <h2>Update Catagory</h2>
            <h5 style="margin-top: 10px;"><a href="{{ url()->previous() }}" style="text-decoration: none;"> <i class="fa fa-long-arrow-left"></i> Previous </a></h5>

          </div>
        </div>
       
        <div class="edit">
            <form action="{{ url('updata_catagory',$datas->id) }}" method="post">
                @csrf
                <input type="text" name="catagory" value="{{ $datas->catagory_name }}">
                <button class="btn btn-success">Update</button>
            </form>
        </div>

       </div> 
        

@include('admin.footer')        