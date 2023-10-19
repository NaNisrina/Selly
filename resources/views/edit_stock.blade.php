@extends('template')
@section('page_title', 'Create Stok')

@section('page_content')

    <!-- Content -->
    <section class="bg-dark text-white py-5">

        <div class="container container_center px-5">

            <div class="row gx-5 justify-content-center">

                <!-- Title -->
                <h1 class="text-center display-5 fw-bolder mb-2 animate__animated animate__zoomIn my-3">
                    Edit Stok: {{ $stock->product_name }}
                </h1>

                <div class="col-lg-12">
                    <!-- Card -->
                    <div class="card-border-0">
                        <!-- Cardhead -->
                        <div class="text-center">
                            <a href="{{ route('stock.index') }}" class="btn btn-outline-dark mt-2 mb-0">
                                <h2 class="text-white">
                                    <i class="fas fa-arrow-left"></i>
                                    Back to Stok
                                </h2>
                            </a>
                        </div>

                        <!-- Cardbody -->
                        <div class="card-body overflow-auto my-3" style="width: 100%;" align="center">

                            <div class="form-body my-3">
                                <div class="container">
                                    {{-- <div class="form-holder"> --}}
                                    <div class="form-content">
                                        <div class="form-items">
                                            {{-- <h3>Create New Data</h3> --}}
                                            {{-- <p class="text-center mb-3 fw-bold">Edit Stock: {{ $stock->product_name }}</p> --}}

                                            <form action="{{ route('stock.update', $stock->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form outline mb-2">
                                                    {{-- <label for="product_img" class="form-label text-start">Product img</label> --}}
                                                    <label for="product_img">Product Image</label>

                                                    <input class="form-control @error('product_img') is-invalid @enderror"
                                                        type="file" id="product_img" name="product_img"
                                                        onchange="previewImage()" multiple>
                                                    <img class="img-preview img-fluid mt-3 mb-3 col-sm-5"
                                                        src="{{ asset('storage/' . $stock->product_img) }}">

                                                    <input type="hidden" name="oldImg" value="{{ $stock->product_img }}">
                                                    @error('product_img')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="form outline mb-2">
                                                    <label for="product_name">Product Name</label>

                                                    {{-- <div class="input-group mb-2"> --}}
                                                    {{-- <div class="input-group-prepend">
                                                                <div class="input-group-text">@</div>
                                                                </div> --}}

                                                    <input
                                                        class="mt-0 form-control @error('product_name') is-invalid @enderror"
                                                        id="product_name" type="text" name="product_name"
                                                        placeholder="enter name..." required
                                                        value="{{ $stock->product_name }}">
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
                                                    <input
                                                        class="mt-0 form-control @error('product_description') is-invalid @enderror"
                                                        type="text" id="product_description" name="product_description"
                                                        placeholder="enter name..."
                                                        value="{{ $stock->product_description }}" required>
                                                    @error('product_description')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    {{-- </div> --}}
                                                </div>

                                                <div class="form-outline mb-2">
                                                    <label for="quantity">Quantity</label>

                                                    {{-- <div class="input-group mb-2"> --}}
                                                    {{-- <div class="input-group-prepend">
                                                             <div class="input-group-text">Pc</div>
                                                        </div> --}}
                                                    <input type="number" id="quantity" name="quantity"
                                                        class="form-control @error('quantity') is-invalid @enderror"
                                                        placeholder="enter quantity..." required
                                                        value="{{ $stock->quantity }}">
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

                                                    <input type="mt-0 text" name="price"
                                                        class="form-control @error('price') is-invalid @enderror"
                                                        id="price" placeholder="enter price..."
                                                        value="{{ $stock->price }}">
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
                                                    {{-- <button id="submit" type="submit"
                                                        class="btn btn-success">Submit</button> --}}
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- </div> --}}
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
        // menampilkan gambar
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
