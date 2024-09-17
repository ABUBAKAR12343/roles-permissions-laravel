<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permissions</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Permissions</h5>
                <a href="{{ route('permissions.create') }}" class="btn btn-primary">Add Permission</a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert-success alert">{{ session('success') }}</div>
                @endif
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Permission Name</th>
                            {{-- <th scope="col">Description</th> --}}
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <th scope="row">{{ $permission->id }}</th>
                            <td>{{ $permission->name }}</td>
                            {{-- <td>Allows viewing of posts</td> --}}
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('permissions.edit',$permission->id) }}">Edit</a>
                                <a href="{{ route('deleteRole',$permission->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
