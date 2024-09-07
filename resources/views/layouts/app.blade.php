<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .buttons{
            display:flex;
        }
        .btn{
            margin-left: 4px;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <nav class="nav flex-column bg-light p-3" style="width: 200px; height: 100vh;">
            <a href="{{ route('posts.index') }}" class="nav-link">All Posts</a>
            <a href="{{ route('posts.create') }}" class="nav-link">Create Post</a>
        </nav>
        <div class="container-fluid p-4">
            @yield('content')
        </div>
    </div>
</body>
</html>
