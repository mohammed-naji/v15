<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add new Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
    <div class="container my-5">

        <div class="d-flex align-items-center justify-content-between">
            <h1>Add new book</h1>
            {{-- <a href="{{ route('books.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> All Books</a> --}}
            <a onclick="history.back()" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Return Back</a>
        </div>

        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" />
                @error('name')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Cover</label>
                <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror" />
                @error('cover')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Publisher</label>
                <input type="text" name="publisher" class="form-control @error('publisher') is-invalid @enderror" value="{{ old('publisher') }}" />
                @error('publisher')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Page Count</label>
                <input type="number" name="page_count" class="form-control @error('page_count') is-invalid @enderror" value="{{ old('page_count') }}" />
                @error('page_count')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Price</label>
                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" />
                @error('price')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-success px-5"> <i class="fas fa-save"></i> Add</button>

        </form>
    </div>

</body>
</html>
