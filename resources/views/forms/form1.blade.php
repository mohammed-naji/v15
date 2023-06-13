<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>

    <div class="container mt-5">
        <h1>Basic Form</h1>
        <form action="{{ route('form1_data') }}" method="post">
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            {{-- {{ csrf_field() }} --}}
            @csrf
            <div class="mb-3">
                <label>Name:</label>
                <input type="text" name="name" placeholder="Name" class="form-control" />
            </div>
            <div class="mb-3">
                <label>Age:</label>
                <input type="number" name="age" placeholder="Age" class="form-control" />
            </div>
            <input type="radio" name="accept" value="Ok"> Accept
            {{-- <input type="submit" class="btn btn-dark px-5" value="Login"> --}}
            <button class="btn btn-dark px-5">Send</button>
        </form>

        {{-- <hr>
        <i class="fa-solid fa-face-sad-tear"></i>
        <i class="fas fa-heart"></i>
        <i class="far fa-heart"></i>
        <i class="fab fa-facebook"></i>

        <table class="table table-bordered table-striped table-hover">
            <tr class="table-dark">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Ali</td>
                <td>Alio@gmail.com</td>
                <td>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Ali</td>
                <td>Alio@gmail.com</td>
                <td>
                    <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="#" title="Delete" class="btn btn-danger btn-sm"><i class="fa-solid fa-face-sad-tear"></i></a>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Ali</td>
                <td>Alio@gmail.com</td>
                <td>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Ali</td>
                <td>Alio@gmail.com</td>
                <td>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </td>
            </tr>
        </table> --}}
    </div>

</body>
</html>
