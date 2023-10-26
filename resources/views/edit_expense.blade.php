@extends('template')
@section('page_title', 'Edit Pengeluaran')

@section('page_content')

    <!-- Content -->
    <section class="bg-dark text-white py-5">

        <div class="container container_center px-5">

            <div class="row gx-5 justify-content-center">

                <!-- Title -->
                <h1 class="text-center display-5 fw-bolder mb-2 animate__animated animate__zoomIn my-3">
                    Edit Stok: {{ $expense->item }}
                </h1>

                <div class="col-lg-12">
                    <!-- Card -->
                    <div class="card-border-0">
                        <!-- Cardhead -->
                        <div class="text-center">
                            <a href="{{ route('stock.index') }}" class="btn btn-outline-dark mt-2 mb-0">
                                <h2 class="text-white">
                                    <i class="fas fa-arrow-left"></i>
                                    Back to Pengeluaran
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

                                                <form action="{{ route('pengeluaran.update', $expense->id) }}" method="POST" enctype="multipart/form-data" class="row">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="col-sm-3 form-outline mb-2">
                                                        <label for="date">Date</label>
                                                        <input class="form-control @error('date') is-invalid @enderror"
                                                            type="date" id="date" name="date"
                                                            placeholder="enter date..." value="{{ $expense->date }}" required>
                                                        @error('date')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-sm-3 form-outline mb-2">
                                                        <label for="item">Item</label>
                                                        <input
                                                            class="mt-0 form-control @error('item') is-invalid @enderror"
                                                            type="text" id="item" name="item"
                                                            placeholder="enter item..." value="{{ $expense->item }}" required>
                                                        @error('item')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-sm-3 form-outline mb-2">
                                                        <label for="quantity">Quantity</label>
                                                        <input type="number" id="quantity" name="quantity"
                                                            class="form-control @error('quantity') is-invalid @enderror"
                                                            placeholder="enter quantity..." value="{{ $expense->quantity }}" required>
                                                        @error('quantity')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-sm-3 form-outline mb-2">
                                                        <label for="price">Price</label>
                                                        <input type="text" name="price"
                                                            class="mt-0 form-control @error('price') is-invalid @enderror" id="price"
                                                            placeholder="enter price..." value="{{ $expense->price }}" required>
                                                        @error('price')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-button mt-3 text-end">
                                                        <button id="submit" type="submit" class="btn btn-success">
                                                            Edit
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
