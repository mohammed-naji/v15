<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trashed Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
        .alert {
            transition: all .5s ease;
        }
        .hide {
            opacity: 0;
            visibility: hidden;
            /* max-height: -20px */
        }
    </style>
</head>
<body>
    {{-- http://127.0.0.1:8000/books?q=cumque+&count=25
    http://127.0.0.1:8000/books --}}
    <div class="container my-5">

        {{-- @if (session('msg'))
            <div class="alert alert-{{ session('type') }}">
                {{ session('msg') }}
            </div>
        @endif --}}


        <div class="d-flex align-items-center justify-content-between">
            <h1>Trahsed books</h1>
            <a href="{{ route('books.index') }}" class="btn btn-dark"><i class="fas fa-plus"></i> All Books</a>
        </div>

        <form action="{{ route('books.trash') }}" method="get" class="d-flex my-3">
            <input type="text" value="{{ request()->q }}" class="form-control" name="q">
            <select class="form-select w-25" name="count">
                <option value="10" @selected(request()->count == 10 )>10</option>
                <option value="15" @selected(request()->count == 15 )>15</option>
                <option value="20" @selected(request()->count == 20 )>20</option>
                <option value="25" @selected(request()->count == 25 )>25 </option>
                <option value="{{ $books->total() }}" @selected(request()->count == $books->total() )>All</option>
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
                        <th>Deleted At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->name }}</td>
                            <td><img width="80" src="{{ asset('uploads/covers/'.$book->cover) }}" alt=""></td>

                            <td>{{ $book->deleted_at ? $book->deleted_at->diffForHumans() : '' }}</td>
                            <td>
                                <a href="{{ route('books.restore', $book->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-undo"></i></a>


                                <form class="d-inline" action="{{ route('books.forcedelete', $book->id) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button onclick="deleteBook(event)" type="button" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                                </form>

                                {{-- <a href="{{ route('books.destroy', $book->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}



                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No Data Available</td>
                        </tr
                    @endforelse
                </tbody>
            </table>

            {{-- {{ $books->appends([
                'q' => request()->q,
                'count' => request()->count
                ])->links() }} --}}

            {{ $books->appends($_GET)->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })


        @if (session('msg'))
        Toast.fire({
            icon: '{{ session("type") }}',
            title: '{{ session("msg") }}'
        })
        // Swal.fire({
        //     title: 'Proccess Complete',
        //     text: '{{ session("msg") }}',
        //     icon: '{{ session("type") }}',
        //     confirmButtonText: 'Done'
        // })
        @endif
    </script>
    {{-- <script>
        setTimeout(() => {
            document.querySelector('.alert').classList.add('hide')
        }, 3000);

        setTimeout(() => {
            document.querySelector('.alert').remove()
        }, 3500);
    </script> --}}

    <script>
        function deleteBook(e) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    e.target.closest('form').submit()
                }
            })
        }
    </script>
</body>
</html>
