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

                <div class="col-lg-12 my-5">
                    <!-- Card -->
                    <div class="card-border-0">
                        <!-- Cardhead -->
                        <div class="">
                            <a href="{{ route('penjualan.create') }}" class="btn btn-success">
                                Create
                                {{-- <i class="fas fa-circle-plus"></i> --}}
                            </a>
                        </div>

                        <!-- Cardbody -->
                        <div class="card-body overflow-auto my-4 t_border">

                            <!-- Table -->
                            <table id="" class="table table-dark text-white table-hover">
                                <!-- Tablehead -->
                                <thead class="my-3 mx-3">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <!-- Tablebody -->
                                <tbody>
                                    @foreach ($sales as $date => $sale_list)
                                        @foreach ($sale_list as $sale)
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
                                        @endforeach
                                        <tr class="table-light">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Total</td>
                                            <td>Rp{{ number_format($sale_list->sum('total'), 2, ',', '.') }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
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

    </section>
    <!-- /Content -->



@endsection
