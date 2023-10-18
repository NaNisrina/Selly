@extends('template')
@section('page_title', 'Create Stok')

@section('page_content')

    <!-- Content -->
    <section class="bg-success-subtle py-5">

        <div class="container container_center px-5">

            <div class="row gx-5 justify-content-center">

                <!-- Title -->
                <h1 class="text-center display-5 fw-bolder mb-2 animate__animated animate__zoomIn my-3">
                    Create Stok
                </h1>

                <div class="col-lg-12 mt-5">
                    <!-- Card -->
                    <div class="card-border-0">
                        <!-- Cardhead -->
                        <div class="card-header text-center">
                            <a href="{{ route('stock.index') }}" class="btn btn-outline-dark mx-2">
                                <i class="fas fa-arrow-left"></i>
                                Back to Stok
                            </a>
                        </div>

                        <!-- Cardbody -->
                        <div class="card-body overflow-auto my-3" style="width: 100%;" align="center">

                            <div class="form-body my-3">
                                <div class="container">
                                    <div class="form-holder">
                                        <div class="form-content">
                                            <div class="form-items">
                                                <h3>Create New Data</h3>
                                                <p>Fill in the data below.</p>

                                                <form action="{{ route('stock.store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-md-12 mb-3" style="width: 22rem;">
                                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                                        <input class="form-control @error('product_img') is-invalid @enderror" type="file" id="product_img" name="product_img" multiple required>
                                                        {{-- <label for="product_img" class="form-label text-start">Product img</label> --}}
                                                        @error('product_img')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12" style="width: 22rem;">
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">@</div>
                                                            </div>
                                                        <input class="form-control @error('product_name') is-invalid @enderror" type="text" id="product_name" name="product_name"
                                                            placeholder="Name" required>
                                                            @error('product_name')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-outline mt-3" style="width: 22rem;">
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">Pc</div>
                                                            </div>
                                                        <input type="number" id="quantity" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
                                                            placeholder="Quantity" required>
                                                            @error('quantity')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-outline mt-3" style="width: 22rem;">
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">Rp</div>
                                                            </div>
                                                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                                                                id="price" placeholder="Price">
                                                                @error('price')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-button mt-1">
                                                        <button id="submit" type="submit"
                                                            class="btn btn-success">Submit</button>
                                                    </div>
                                                </form>
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
