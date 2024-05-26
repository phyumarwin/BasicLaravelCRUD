<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" 
        integrity="sha384-L4CR5VG/5C7K5bE6F5+z3E6bL5+X8ElL5a8e5X8xL8c9xP8e5Z8+eX8xL8c9xP8e" 
        crossorigin="anonymous">
        <title>Index form</title>
    <style>
        body {
            padding: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h5>Posts List</h5>
                <a href="{{ url('posts/create') }}">
                    <button class="btn btn-primary btn-sm float-end mb-3">Add New</button>
                </a>
                @if (Session('successAlert'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <strong>{{ Session('successAlert') }}</strong>
                    </div>
                @endif
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td>
                                <form action="{{ url('posts/'.$post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ url('posts/'.$post->id.'/edit') }}">
                                        <button type="button" class="btn btn-success btn-sm">
                                            Edit
                                        </button>
                                    </a>
                                    <button type="submit" 
                                        class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Are you sure you want to delete?')">
                                        Delete
                                    </button>
                                </form>
                                
                            </td>
                        </tr> 
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous">
    </script>
</body>
</html>
