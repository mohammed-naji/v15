<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Books</title>
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
            <h1>All books</h1>
            <div>
                <a href="{{ route('books.create') }}" class="btn btn-dark"><i class="fas fa-plus"></i> Add new Book</a>
                <a href="{{ route('books.trash') }}" class="btn btn-danger"><i class="fas fa-trash"></i> Trashed</a>
            </div>
        </div>

        <form action="{{ route('books.index') }}" method="get" class="d-flex my-3">
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
                            {{-- <td>@dump($loop)</td> --}}
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $book->name }}</td>
                            <td><img width="80" src="{{ asset('uploads/covers/'.$book->cover) }}" alt=""></td>
                            <td>{{ $book->publisher }}</td>
                            <td>{{ $book->page_count }}</td>
                            <td>{{ $book->price }}</td>
                            <td>{{ $book->created_at ? $book->created_at->format('d M, Y') : '' }}</td>
                            <td>{{ $book->updated_at ? $book->updated_at->diffForHumans() : '' }}</td>
                            <td>
                                <a onclick="updateBook(event)" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>


                                <form class="d-inline" action="{{ route('books.destroy', $book->id) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button onclick="deleteBook(event)" type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" />
                    @error('name')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 oldimage">
                    <label>Cover</label>
                    <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror" />
                    @error('cover')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                    <img width="80" src="" alt="">
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

                <button class="btn btn-success px-5"> <i class="fas fa-save"></i> Update</button>

            </form>
        </div>

      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


{{-- Ajax Update --}}
<script>

function updateBook(e) {
    // Get Old Data

    let tr = e.target.closest('tr');
    let oldtitle = tr.querySelector('td:nth-child(2)').innerHTML
    let oldcover = tr.querySelector('td:nth-child(3) img')
    let oldpublisher = tr.querySelector('td:nth-child(4)').innerHTML
    let oldpagecount = tr.querySelector('td:nth-child(5)').innerHTML
    let oldprice = tr.querySelector('td:nth-child(6)').innerHTML

    // console.log(oldtitle, oldcover, oldpublisher, oldpagecount, oldprice);
    // Add Data to Form
    document.querySelector('input[name=name]').value = oldtitle
    document.querySelector('input[name=publisher]').value = oldpublisher
    document.querySelector('input[name=page_count]').value = oldpagecount
    document.querySelector('input[name=price]').value = oldprice


    // document.querySelector('.oldimage').innerHTML += oldcover
    document.querySelector('.oldimage img').src = oldcover.src
    // Update Data
}

</script>





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
