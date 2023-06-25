<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
    {{-- http://127.0.0.1:8000/books?q=cumque+&count=25
    http://127.0.0.1:8000/books --}}
    <div class="container my-5">
        <h1>All books</h1>
        <form action="{{ route('books.index') }}" method="get" class="d-flex my-3">
            <input type="text" class="form-control" name="q">
            <select class="form-select w-25" name="count">
                <option>10</option>
                <option>15</option>
                <option>20</option>
                <option>25 </option>
                <option>All</option>
            </select>
            <button class="btn btn-dark">
                <i class="fas fa-search"></i>
            </button>
        </form>
        <div class="table-responsive" style="overflow-y: hidden">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Cover</th>
                        <th>publisher</th>
                        <th>Page Count</th>
                        <th>Price</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @if (count($books) > 0)
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->name }}</td>
                                <td><img width="80" src="{{ asset('uploads/'.$book->cover) }}" alt=""></td>
                                <td>{{ $book->publisher }}</td>
                                <td>{{ $book->page_count }}</td>
                                <td>{{ $book->price }}</td>
                                <td>{{ $book->created_at->format('d M, Y') }}</td>
                                <td>{{ $book->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="8" class="text-center">No Data Available</td>
                    </tr>
                    @endif --}}

                    @forelse ($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->name }}</td>
                            <td><img width="80" src="{{ asset('uploads/'.$book->cover) }}" alt=""></td>
                            <td>{{ $book->publisher }}</td>
                            <td>{{ $book->page_count }}</td>
                            <td>{{ $book->price }}</td>
                            <td>{{ $book->created_at->format('d M, Y') }}</td>
                            <td>{{ $book->updated_at->diffForHumans() }}</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No Data Available</td>
                        </tr
                    @endforelse
                </tbody>
            </table>

            {{ $books->links() }}
        </div>
    </div>

</body>
</html>
