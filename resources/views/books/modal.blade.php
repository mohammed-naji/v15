  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data">

                @csrf
                @method('put')

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" />
                    @error('name')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 oldimage">
                    <label>Cover</label>
                    <input onchange="prevImg(event)" type="file" name="cover" class="form-control @error('cover') is-invalid @enderror" />
                    @error('cover')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                    <img id="showimg" width="80" src="" alt="">
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
