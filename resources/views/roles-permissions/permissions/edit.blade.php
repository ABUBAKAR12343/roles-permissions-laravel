<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Permissions</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Permissions</h5>
                <a href="{{ route('permissions.edit',$permission->id) }}" class="btn btn-primary">Back</a>
            </div>
            <div class="card-body">
                <form id="newPermissionForm" action="{{ route('update',$permission->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                         <label for="">Name</label>
                        <input type="text" class="form-control" value="{{ $permission->name }}" name="name" id="newPermissionName" placeholder="Permission Name" >
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                     </div>
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
