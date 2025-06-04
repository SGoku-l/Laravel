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
                <h2 class="h5">Add Category</h2>

                <div class="category-form">
                    <form action="{{ url('add_catagory') }}" method="POST">
                        @csrf
                        <input type="text" name="catagory" placeholder="Enter category name" required>
                        <button class="btn btn-primary" type="submit">Add Category</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="container table-container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <table class="table table-bordered table-striped text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Category Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $datas)
                                <tr>
                                    <td class="text-white">{{ $datas->catagory_name }}</td>
                                    <td>
                                        <a href="{{ url('edit_catagory/'.$datas->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('delete_catagory/'.$datas->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
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
