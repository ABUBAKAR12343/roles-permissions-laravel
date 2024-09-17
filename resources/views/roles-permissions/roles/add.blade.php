<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Roles</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Add Roles</h5>
                <a href="{{ route('roles.index') }}" class="btn btn-primary">Back</a>
            </div>
            <div class="card-body">
                <form id="newPermissionForm" method="POST" action="{{ route('roles.store') }}">
                    @csrf
                    <div class="mb-3">
                         <label for="">Name</label>
                        <input type="text" class="form-control" name="name" id="newPermissionName" placeholder="Permission Name" >
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <div class="mb-3">
                     @foreach ($permissions as $permission)
                     <input type="checkbox" class="" id="check{{ $permission->id }}" name="permissions[]" value="{{ $permission->name }}" id="newPermissionName" placeholder="Permission Name" >
                     <label for="check{{ $permission->id }}" id="">{{ $permission->name }}</label>
                     @endforeach

                    </div>
                        <button type="submit" class="btn btn-success btn-sm">Save</button>
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
