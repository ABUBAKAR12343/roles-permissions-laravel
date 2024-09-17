<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Submit Your Information</h2>
        <form action="{{ route('updateArticle',$article->id) }}" method="POST">
           
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" value="{{ $article->title }}" id="title" name="title" placeholder="Enter title" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" value="" name="description" rows="4" placeholder="Enter description" required>{{ $article->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" value="{{ $article->author }}" id="author" name="author" placeholder="Enter author" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
