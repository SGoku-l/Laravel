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
        <h2 class="mb-4 text-white">Users</h2>

        <form class="search-form" action="{{ url('users_search') }}" method="get">
          <input type="search" name="search" value="{{ @$search }}" placeholder="Search Users...">
          <button type="submit" class="btn btn-secondary">Search</button>
        </form>
      </div>
    </div>

    <div class="container mt-5 mb-4">
      <div class="row justify-content-center">
        <div class="col-md-12 glass-container">
          <table class="table table-bordered table-striped text-center align-middle">
            <thead>
              <t>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Delete</th>
              </t>
            </thead>
            <tbody>
              @foreach ($users_list as $users)
              <tr>
                <td>{{ $users->name }}</td>
                <td>{{ $users->email }}</td>
                <td>{{ $users->phone }}</td>
                <td>{{ $users->address }}</td>
                <td><a href="{{ url('delete_products/'.$users->id) }}" class="btn btn-sm btn-outline-danger">Delete</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
           <div class="d-flex justify-content-center mt-3">
                      {{ $users_list->links() }}
            </div>
        </div>
      </div>
    </div>
  </div>

  @include('admin.footer')
</body>
</html>
