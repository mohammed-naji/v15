<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
        .card .card-title,
        .card .card-text {
            height: 48px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>All Posts</h2>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-3">
                    <div class="card mb-4">
                        <img src="{{ $post->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::words($post->body, 6, '...') }}</p>
                        <a href="{{ route('single_post', $post->id) }}" class="btn btn-dark w-100">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>

</body>
</html>
