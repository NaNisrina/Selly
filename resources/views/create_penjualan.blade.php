@extends('template')
@section('page_title', 'Create Penjualan')

@section('page_content')

    <!-- Content -->
    <section class="bg-dark text-white py-5">

        <div class="container container_center px-5">

            <div class="row gx-5 justify-content-center">

                <!-- Title -->
                <h1 class="text-center display-5 fw-bolder mb-2 animate__animated animate__zoomIn my-3">
                    Create Penjualan
                </h1>

                <div class="col-lg-12">
                    <!-- Card -->
                    <div class="card-border-0">
                        <!-- Cardhead -->
                        <div class="text-center">
                            <a href="{{ route('penjualan.index') }}" class="btn btn-outline-dark mx-2">
                                <h2 class="text-white">
                                    <i class="fas fa-arrow-left"></i>
                                    Back to Penjualan
                                </h2>
                            </a>
                        </div>

                        <!-- Cardbody -->
                        <div class="card-body overflow-auto" style="width: 100%;" align="center">

                            <div class="form-body my-3">
                                <div class="container">
                                    {{-- <div class="form-holder"> --}}
                                        <div class="form-content">
                                            <div class="form-items">
                                                {{-- <h3>Create New Data</h3>
                                                <p>Fill in the data below.</p> --}}

                                                <form action="{{ route('penjualan.store') }}" method="POST">
                                                    @csrf

                                                    {{-- <input type="hidden" name="{{  }}"> --}}

                                                    <div class="form-outline mb-2">
                                                        <label for="date">Date</label>

                                                        {{-- <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">@</div>
                                                            </div> --}}
                                                        <input class="form-control @error('date') is-invalid @enderror" type="date" id="date" name="date"
                                                            placeholder="enter date..." required>
                                                            @error('date')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        {{-- </div> --}}
                                                    </div>

                                                    <div class="form-outline mb-2">
                                                        <label for="product_name">Product Name</label>

                                                        {{-- <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">@</div>
                                                            </div> --}}
                                                        <select name="stock_id" id="stock_id" onchange="halah()">
                                                            <option value="" selected disabled >Product Name</option>
                                                            @foreach ($stocks as $stock)
                                                                <option value="{{ $stock->id }}">{{ $stock->product_name }} - {{ $stock->price }}</option>
                                                            @endforeach
                                                        </select>
                                                            @error('product_name')
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
                                                        <input type="number" id="stock_sold" name="stock_sold" class="form-control @error('stock_sold') is-invalid @enderror"
                                                            placeholder="enter quantity..." required>
                                                            @error('quantity')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        {{-- </div> --}}
                                                    </div>

                                                    {{-- <div class="form-outline mb-2">
                                                        <label for="price">Price</label>

                                                        <input type="text" id="taudeh">
                                                        <p>{{ App\Models\Stock::where('id', myFunction()) }}</p>

                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">Rp</div>
                                                            </div>
                                                            <select name="price" id="price">
                                                                <option value="" selected disabled>Price</option>
                                                                @foreach ($stocks as $stock)
                                                                    <option value="{{ $stock->price }}">{{ $stock->price }}</option>
                                                                @endforeach
                                                            </select>
                                                                @error('price')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                        </div>
                                                    </div> --}}

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
        function halah() {
            function myFunction() {
                var value = document.getElementById("stock_id").value;
                // document.getElementById("value").value = value;
                return(value);
            }
            // document.getElementById('taudeh').value = myFunction();
            return myFunction();
        }
    </script>

@endsection
