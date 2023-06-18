<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>

    <div class="container mt-5">
        <h1>Basic Form</h1>
        <form action="{{ route('form4_data') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control" />
            </div>
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control" onchange="readURL(this);" />
                <img id="showimage" width="80" src="" alt="">
            </div>

            <button class="btn btn-dark px-5">Send</button>
        </form>
    </div>

    <script>
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('showimage').src = e.target.result
            };

            reader.readAsDataURL(input.files[0]);
        }
        }
    </script>
</body>
</html>
