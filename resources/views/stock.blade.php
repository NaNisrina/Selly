@extends('template')
@section('page_title', 'Stok')

@section('page_content')

    <!-- Content -->
    <section class="bg-dark py-5">

        <div class="container container_center px-5">

            <div class="row gx-5 justify-content-center">

                <!-- Title -->
                <h1 class="text-white text-center display-5 fw-bolder animate__animated animate__zoomIn">
                    Stok
                </h1>

                <div class="col-lg-12">
                    <!-- Card -->
                    <div class="card-border-0">
                        <!-- Cardhead -->
                        <div class="card-header bg-dark text-white">
                            {{-- <a href="{{ route('stock.create') }}" class="btn btn-outline-dark mx-2">
                                Create
                                <i class="fas fa-circle-plus"></i>
                            </a> --}}

                            <div class="form-items justify-content-center">

                                <div class="form-content">
                                    <div class="form-items">
                                        <p class="text-center my-0">Create New Stock:</p>

                                        <form action="{{ route('stock.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-outline mb-2">
                                                <label for="product_img">Product Image</label>

                                                <input class="form-control @error('product_img') is-invalid @enderror" type="file" id="product_img" name="product_img" onchange="previewImage()" multiple required>
                                                <img class="img-preview img-fluid mt-3 mb-3 col-sm-5">
                                                {{-- <label for="product_img" class="form-label text-start">Product img</label> --}}
                                                @error('product_img')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-outline mb-2">
                                                <label for="product_name">Product Name</label>

                                                {{-- <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">@</div>
                                                    </div> --}}
                                                <input class="form-control @error('product_name') is-invalid @enderror" type="text" id="product_name" name="product_name"
                                                    placeholder="enter name..." required>
                                                    @error('product_name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                {{-- </div> --}}
                                            </div>

                                            <div class="form-outline mb-2">
                                                <label for="product_description">Product Description</label>

                                                {{-- <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">@</div>
                                                    </div> --}}
                                                <input class="form-control @error('product_description') is-invalid @enderror" type="text" id="product_description" name="product_description"
                                                    placeholder="enter name..." required>
                                                    @error('product_description')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                {{-- </div> --}}
                                            </div>

                                            <div class="form-outline mb-2">
                                                <label for="quantity">Quantity</label>

                                                {{-- <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Pc</div>
                                                    </div> --}}
                                                <input type="number" id="quantity" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
                                                    placeholder="enter quantity..." required>
                                                    @error('quantity')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                {{-- </div> --}}
                                            </div>

                                            <div class="form-outline mb-2">
                                                <label for="price">Price</label>

                                                {{-- <div class="input-group mb-2"> --}}
                                                    {{-- <div class="input-group-prepend">
                                                        <div class="input-group-text">Rp</div>
                                                    </div> --}}
                                                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                                                        id="price" placeholder="enter price..."  required>
                                                        @error('price')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                {{-- </div> --}}
                                            </div>

                                            <div class="form-button mt-3 text-end">
                                                <button id="submit" type="submit" class="btn btn-success">
                                                    Create
                                                    {{-- <i class="fas fa-circle-plus"></i> --}}
                                                </button>
                                                <button id="reset" type="reset" class="btn btn-primary">
                                                    Reset
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Cardbody -->
                        <div class="card-body my-3" style="width: 100%;" align="center">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card QA_section border-0 bg-dark">
                                        <div class="card-body QA_table">
                                            <div class="table-responsive shopping-cart">
                                                <table class="table mb-0 text-center table-dark">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-top-0">#</th>
                                                            <th class="border-top-0">Product</th>
                                                            <th class="border-top-0">Price</th>
                                                            <th class="border-top-0" style="width:15%">Quantity</th>
                                                            <th class="border-top-0">Total</th>
                                                            <th class="border-top-0">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($stocks as $stock)
                                                            <tr>
                                                                <td class="align-middle">{{ $loop->iteration }}</td>
                                                                <td class="align-middle">
                                                                    <img class="img_table" src="{{ asset('storage/' . $stock->product_img) }}" alt="" width="100px" height="80px">
                                                                    <p class="d-inline-block align-middle mb-0 ms-3">
                                                                        <span class="text-white">{{ $stock->product_name }}</span>
                                                                    </p>
                                                                </td>
                                                                <td class="align-middle">Rp{{ number_format($stock->price, 2, ',', '.') }}</td>
                                                                <td class="align-middle">{{ $stock->quantity }}</td>
                                                                <td class="align-middle">Rp{{ number_format($stock->total, 2, ',', '.') }}</td>
                                                                <td class="align-middle">
                                                                    <a href="{{ route('stock.edit', $stock->id) }}"
                                                                        class="btn btn-light">
                                                                        {{-- text-dark border-0 --}}
                                                                        <i class="far fa-pen-to-square"></i></a>
                                                                    <form action="{{ route('stock.destroy', $stock->id) }}"
                                                                        method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="btn btn-light"
                                                                            type="submit" onclick="return confirm('Delete this Product?')"><i
                                                                                class="fas fa-trash"></i></button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </section>
    <!-- /Content -->

    <script>
        // menampilkan gambar (hapus kl gk butuh)
        function previewImage() {
            const img = document.querySelector('#product_img');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(img.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>

@endsection
