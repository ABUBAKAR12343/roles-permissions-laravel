<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit User</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="mb-3">
                @foreach ($roles as $role)
                <input {{ ($hasRoles->contains( $role->id) ?'checked' : '') }} type="checkbox" class="" id="check{{ $role->id }}" name="role[]" value="{{ $role->name }}" id="newPermissionName" placeholder="Permission Name" >
                <label for="check{{ $role->id }}" id="">{{ $role->name }}</label>
                @endforeach

               </div>
            <!-- Add more fields as necessary -->
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>
