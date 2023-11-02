@extends('template')
@section('page_title', 'Penjualan')

@section('page_content')

    <!-- Content -->
    <section class="bg-dark text-white py-5">

        <div class="container">

            <div class="row gx-5 justify-content-center">

                <!-- Title -->
                <h1 class="text-center display-5 fw-bolder mb-2 animate__animated animate__zoomIn">
                    Penjualan
                </h1>

                <div class="col-lg-12">
                    <!-- Card -->
                    <div class="card-border-0">
                        <!-- Cardhead -->
                        <div class="card-header bg-dark text-white">

                            <!-- KeuntunganCard -->
                            <div class="row">
                                <div class="col-4 mt-4 mb-3">
                                    <div class="card_custom text-dark mb-3 card_kas">
                                        <div class="card-body text-center">
                                            <h5 class="card-title fw-bold fs-4">Keuntungan</h5>
                                            <hr>
                                            <p class="fs-3 card-text fw-lighter">
                                                Rp {{ number_format($keuntungan, 2, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4 mt-4 mb-3">
                                    <div class="card_custom text-dark mb-3 card_sale">
                                        <div class="card-body text-center">
                                            <h5 class="card-title fw-bold fs-4">Penjualan</h5>
                                            <hr>
                                            <p class="fs-3 card-text fw-lighter">
                                                Rp {{ number_format($totalpenjualan, 2, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4 mt-4 mb-3">
                                    <div class="card_custom text-dark mb-3 card_expense">
                                        <div class="card-body text-center">
                                            <h5 class="card-title fw-bold fs-4">Produksi</h5>
                                            <hr>
                                            <p class="fs-3 card-text fw-lighter">
                                                Rp {{ number_format($totalproduksi, 2, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /KeuntunganCard -->

                            <div class="text-end">
                                <a href="{{ route('penjualan.create') }}" class="btn btn-success">
                                    Create
                                    <i class="ms-1 fas fa-circle-plus"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Cardbody -->
                        <div class="card-body mt-0 t_border">

                            <div class="card-body mb-3" style="width: 100%;" align="center">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card QA_section border-0 bg-dark">
                                            <div class="card-body QA_table">
                                                <div class="table-responsive shopping-cart">

                                                    <!-- Table -->
                                                    <table id="" class="table table-dark table-hover text-white text-center mb-0">
                                                        <!-- Tablehead -->
                                                        <thead class="my-3 mx-3">
                                                            <tr>
                                                                <th class="border-top-0" scope="col">#</th>
                                                                <th class="border-top-0" scope="col">Date</th>
                                                                <th class="border-top-0" scope="col">Product</th>
                                                                <th class="border-top-0" scope="col">Quantity</th>
                                                                <th class="border-top-0" scope="col">Harga Produksi</th>
                                                                <th class="border-top-0" scope="col">Harga Jual</th>
                                                                <th class="border-top-0" scope="col">Total</th>
                                                                <th class="border-top-0" scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <!-- Tablebody -->
                                                        <tbody>
                                                            @foreach ($sales as $date => $sale_list)
                                                                @foreach ($sale_list as $sale)
                                                                    <tr>
                                                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                                                        <td class="align-middle">{{ $sale->date }}</td>
                                                                        <td class="align-middle">{{ $sale->stock->product_name }}</td>
                                                                        <td class="align-middle">{{ $sale->stock_sold }}</td>
                                                                        <td class="align-middle">Rp{{ number_format($sale->stock->price, 2, ',', '.') }}</td>
                                                                        <td class="align-middle">Rp{{ number_format($sale->harga_jual, 2, ',', '.') }}</td>
                                                                        <td class="align-middle">Rp{{ number_format($sale->total_penjualan, 2, ',', '.') }}</td>

                                                                        <td class="align-middle">

                                                                                <!-- Edit -->
                                                                                <a href="{{ route('penjualan.edit', $sale->id) }}" class="btn btn-outline-light">
                                                                                    <i class="fas fa-pen-to-square"></i>
                                                                                </a>

                                                                                <!-- Delete -->
                                                                                <form action="{{ route('penjualan.destroy', $sale->id) }}"
                                                                                    method="POST" class="d-inline">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                    <button class="btn btn-outline-light" type="submit" onclick="return confirm('Delete this Data?')">
                                                                                        <i class="fas fa-trash"></i>
                                                                                    </button>
                                                                                </form>

                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td colspan="4"></td>

                                                                    <td>Daily</td>
                                                                    <td colspan="3">Rp{{ number_format($sale_list->sum('total_penjualan'), 2, ',', '.') }}</td>
                                                                </tr>
                                                            @endforeach

                                                            <!-- TOTAL KESELURUHAN -->
                                                                <tr>
                                                                    <td colspan="4"></td>
                                                                    <td>All Sales</td>
                                                                    <td colspan="3">Rp{{ number_format($totalpenjualan, 2, ',', '.') }}</td>
                                                                </tr>
                                                        <!-- /TOTAL KESELURUHAN-->

                                                            {{-- @foreach ($sales as $sale)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $sale->date }}</td>
                                                                <td>{{ $sale->stock->product_name }}</td>
                                                                <td>{{ $sale->stock_sold }}</td>
                                                                <td>Rp{{ number_format($sale->stock->price, 2, ',', '.') }}</td>
                                                                <td>Rp{{ number_format($sale->total, 2, ',', '.') }}</td>

                                                                <td>
                                                                    <div class="d-flex" style="gap: 3px">

                                                                        <!-- Edit -->
                                                                        <a href="{{ route('penjualan.edit', $sale->id) }}" class="btn btn-outline-light">
                                                                            <i class="fas fa-pen-to-square"></i>
                                                                        </a>

                                                                        <!-- Delete -->
                                                                        <form action="{{ route('penjualan.destroy', $sale->id) }}"
                                                                            method="POST" class="d-inline">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <button class="btn btn-outline-light" type="submit" onclick="return confirm('Delete this Data?')">
                                                                                <i class="fas fa-trash"></i>
                                                                            </button>
                                                                        </form>

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach --}}
                                                        </tbody>

                                                        <!-- /Tablebody -->

                                                        <!-- Tablebody -->
                                                        {{-- <tbody class="table table-bordered table-dark">
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>Total</td>
                                                                <td>Rp{{ number_format($sum, 2, ',', '.') }}</td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody> --}}
                                                     <!-- /tbody -->

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

        </div>

    </section>
    <!-- /Content -->



@endsection
