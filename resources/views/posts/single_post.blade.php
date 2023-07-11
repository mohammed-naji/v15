<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>single Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>

    <div class="container my-5 text-center">
        <a class="btn btn-dark" href="{{ route('all_posts') }}">Return Back</a>
        <h2>{{ $post->title }}</h2>
        <small><i class="far fa-clock"></i> {{ $post->created_at->diffForHumans() }}</small>
        <div class="mt-3">
            <img class="w-50" src="{{ $post->image }}" alt="">
        </div>
        <div class="mt-5 w-75 mx-auto">
            {{ $post->body }}
        </div>

        <hr>

        {{-- @dump() --}}

        <h2>Post Comments ({{ $post->comments_count }})</h2>

        <div class="w-50 mx-auto text-start">

            @foreach ($post->comments as $comment)
            {{-- @if (is_null($comment->replay_to)) --}}
            <div class="mb-4">
                <div class="d-flex align-items-center mb-2">
                    <h4 class="m-0">{{ $comment->user->name }}</h4>
                    <small class="mx-4" style="position: relative; top:3px">{{ $comment->created_at->diffForhumans() }}</small>
                </div>
                <p>{{ $comment->body }}</p>
                <button onclick="replay_to({{ $comment->id }})" class="btn btn-sm btn-light">Replay</button>
            </div>

            @foreach ($comment->replayed as $replay)
                <div class="mb-2 bg-light p-4 ms-5">
                    <div class="d-flex align-items-center mb-2">
                        <h4 class="m-0">{{ $replay->user->name }}</h4>
                        <small class="mx-4" style="position: relative; top:3px">{{ $replay->created_at->diffForhumans() }}</small>
                    </div>
                    <p>{{ $replay->body }}</p>
                </div>
            @endforeach
            {{-- @endif --}}

            @endforeach

            <hr>

            <h4 class="add_new">Add New Comment</h4>
            <form action="{{ route('comment_post', $post->id) }}" method="POST">
                @csrf
                <input type="hidden" name="replay_to">
                <input type="hidden" name="user_id" value="1">
                <textarea placeholder="Comment Here..." class="form-control mb-3" rows="3" name="body"></textarea>
                <button class="btn btn-dark">Post comment</button>
            </form>

        </div>

    </div>

    <script>
        function replay_to(id) {
            let top = document.querySelector('textarea').offsetTop

            // console.log(`Top position of textarea is ${top}`)

            window.scrollTo({
                top: top,
                behavior:'smooth'
            });
            document.querySelector('.add_new').innerHTML = 'Replay to comment'
            document.querySelector('input[name=replay_to]').value = id
        }
    </script>
</body>
</html>
