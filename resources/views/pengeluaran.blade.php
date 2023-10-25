@extends('template')
@section('page_title', 'Pengeluaran')

@section('page_content')

<!-- Content -->
<section class="bg-dark py-5">

    <div class="container container_center px-5">

        <div class="row gx-5 justify-content-center">

            <!-- Title -->
            <h1 class="text-white text-center display-5 fw-bolder animate__animated animate__zoomIn">
                Pengeluaran
            </h1>

            <div class="col-lg-12">
                <!-- Card -->
                <div class="card-border-0">
                    <!-- Cardhead -->
                    <div class="card-header bg-dark text-white">

                        <!-- KasCard -->
                            <div class="row">
                                <div class="col-4 mt-4 mb-5">
                                    <div class="card_custom text-dark mb-3 card_kas">
                                        <div class="card-body text-center">
                                            <h5 class="card-title fw-bold fs-4">Kas</h5>
                                            <hr>
                                            <p class="fs-3 card-text fw-lighter">
                                                Rp: 0,00
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4 mt-4 mb-5">
                                    <div class="card_custom text-dark mb-3 card_sale">
                                        <div class="card-body text-center">
                                            <h5 class="card-title fw-bold fs-4">Penjualan</h5>
                                            <hr>
                                            <p class="fs-3 card-text fw-lighter">
                                                Rp: 0,00
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4 mt-4 mb-5">
                                    <div class="card_custom text-dark mb-3 card_expense">
                                        <div class="card-body text-center">
                                            <h5 class="card-title fw-bold fs-4">Pengeluaran</h5>
                                            <hr>
                                            <p class="fs-3 card-text fw-lighter">
                                                Rp: 0,00
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /KasCard -->

                        <div class="form-items justify-content-center">

                                <div class="form-items">

                                    <form action="" method="POST" enctype="multipart/form-data" class="row">
                                        @csrf

                                        <div class="col-sm-3 form-outline mb-2">
                                            <label for="date">Date</label>
                                            <input class="form-control @error('date') is-invalid @enderror"
                                                type="date" id="date" name="date"
                                                placeholder="enter date..." required>
                                            @error('date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-3 form-outline mb-2">
                                            <label for="item">Item</label>
                                            <input
                                                class="form-control @error('item') is-invalid @enderror"
                                                type="text" id="item" name="item"
                                                placeholder="enter item..." required>
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
                                                placeholder="enter quantity..." required>
                                            @error('quantity')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-3 form-outline mb-2">
                                            <label for="price">Price</label>
                                            <input type="text" name="price"
                                                class="form-control @error('price') is-invalid @enderror" id="price"
                                                placeholder="enter price..." required>
                                            @error('price')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-button mt-3 text-end">
                                            <button id="submit" type="submit" class="btn btn-success">
                                                Create
                                            </button>
                                            <button id="reset" type="reset" class="btn btn-primary">
                                                Reset
                                            </button>
                                        </div>
                                    </form>

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
                                            <table class="table mb-0 text-center table-dark table-hover">
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

                                                    <!-- Foreach -->
                                                    <tr>
                                                        <td class="align-middle">1</td>
                                                        <td class="align-middle">
                                                            <p class="d-inline-block align-middle mb-0 ms-3">
                                                                <span class="text-white">product name</span>
                                                            </p>
                                                        </td>
                                                        <td class="align-middle">price</td>
                                                        <td class="align-middle">quantity</td>
                                                        <td class="align-middle">total</td>
                                                        <td class="align-middle">
                                                            <a href="#" class="btn btn-light">
                                                                {{-- text-dark border-0 --}}
                                                                <i class="far fa-pen-to-square"></i></a>
                                                            <form action="" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-light" type="submit"
                                                                    onclick="return confirm('Delete this Product?')"><i
                                                                        class="fas fa-trash"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <!-- /Foreach -->

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

<!-- DELETE LATER -->

    <!-- Content -->
    <section class="bg-dark py-5">

        <div class="container container_center px-5">

            <div class="row gx-5 justify-content-center">

                <!-- Title -->
                <h1 class="text-white text-center display-5 fw-bolder animate__animated animate__zoomIn">
                    Pengeluaran
                </h1>

                <div class="col-lg-12">
                    <!-- Card -->
                    <div class="card-border-0">
                        <!-- Cardhead -->
                        <div class="card-header bg-dark text-white">

                            <!-- KasCard -->
                            <div class="row">
                                <div class="col-4 mt-4 mb-5">
                                    <div class="card_custom text-dark mb-3 card_kas">
                                        <div class="card-body text-center">
                                            <h5 class="card-title fw-bold fs-4">Kas</h5>
                                            <hr>
                                            <p class="fs-3 card-text fw-lighter">
                                                Rp: 0,00
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4 mt-4 mb-5">
                                    <div class="card_custom text-dark mb-3 card_sale">
                                        <div class="card-body text-center">
                                            <h5 class="card-title fw-bold fs-4">Penjualan</h5>
                                            <hr>
                                            <p class="fs-3 card-text fw-lighter">
                                                Rp: 0,00
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4 mt-4 mb-5">
                                    <div class="card_custom text-dark mb-3 card_expense">
                                        <div class="card-body text-center">
                                            <h5 class="card-title fw-bold fs-4">Pengeluaran</h5>
                                            <hr>
                                            <p class="fs-3 card-text fw-lighter">
                                                Rp: 0,00
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /KasCard -->

                            <div class="form-items justify-content-center">

                                    <div class="form-items">

                                        <form action="" method="POST" enctype="multipart/form-data" class="row">
                                            @csrf

                                            <div class="col-sm-3 form-outline mb-2">
                                                <label for="date">Date</label>
                                                <input class="form-control @error('date') is-invalid @enderror"
                                                    type="date" id="date" name="date"
                                                    placeholder="enter date..." required>
                                                @error('date')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-sm-3 form-outline mb-2">
                                                <label for="item">Item</label>
                                                <input
                                                    class="form-control @error('item') is-invalid @enderror"
                                                    type="text" id="item" name="item"
                                                    placeholder="enter item..." required>
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
                                                    placeholder="enter quantity..." required>
                                                @error('quantity')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-sm-3 form-outline mb-2">
                                                <label for="price">Price</label>
                                                <input type="text" name="price"
                                                    class="form-control @error('price') is-invalid @enderror" id="price"
                                                    placeholder="enter price..." required>
                                                @error('price')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-button mt-3 text-end">
                                                <button id="submit" type="submit" class="btn btn-success">
                                                    Create
                                                </button>
                                                <button id="reset" type="reset" class="btn btn-primary">
                                                    Reset
                                                </button>
                                            </div>
                                        </form>

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
                                                <table class="table mb-0 text-center table-dark table-hover">
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

                                                        <!-- Foreach -->
                                                        <tr>
                                                            <td class="align-middle">1</td>
                                                            <td class="align-middle">
                                                                <p class="d-inline-block align-middle mb-0 ms-3">
                                                                    <span class="text-white">product name</span>
                                                                </p>
                                                            </td>
                                                            <td class="align-middle">price</td>
                                                            <td class="align-middle">quantity</td>
                                                            <td class="align-middle">total</td>
                                                            <td class="align-middle">
                                                                <a href="#" class="btn btn-light">
                                                                    {{-- text-dark border-0 --}}
                                                                    <i class="far fa-pen-to-square"></i></a>
                                                                <form action="" method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="btn btn-light" type="submit"
                                                                        onclick="return confirm('Delete this Product?')"><i
                                                                            class="fas fa-trash"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        <!-- /Foreach -->

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

@endsection
