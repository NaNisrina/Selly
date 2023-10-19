@extends('template')
@section('page_title', 'Penjualan')

@section('page_content')

    <!-- Content -->
    <section class="bg-success-subtle py-5">

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
                        <div class="card-header">
                            <a href="{{ route('penjualan.create') }}" class="btn btn-outline-dark">
                                Create
                                <i class="fas fa-circle-plus"></i>
                            </a>
                        </div>

                        <!-- Cardbody -->
                        <div class="card-body overflow-auto my-4 t_border">

                            <!-- Table -->
                            <table id="" class="table table-striped table-success table-hover">
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
                                    @foreach ($sales as $sale)    
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sale->date }}</td>
                                        <td>{{ $sale->product_name }}</td>
                                        <td>{{ $sale->stock_sold }}</td>
                                        <td>{{ $sale->price }}</td>
                                        <td>{{ $sale->total }}</td>

                                        <td>
                                            <div class="d-flex" style="gap: 3px">

                                                <!-- Edit -->
                                                <a href="" class="btn btn-outline-dark">
                                                    <i class="fas fa-pen-to-square"></i>
                                                </a>

                                                <!-- Delete -->
                                                <form action="">
                                                    <button class="btn btn-outline-dark"
                                                        onclick="return confirm('Delete this Data?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>

                                            </div>
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

    </section>
    <!-- /Content -->

@endsection
