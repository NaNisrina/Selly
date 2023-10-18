@extends('template')
@section('page_title', 'Stok')

@section('page_content')

    <!-- Content -->
    <section class="bg-success-subtle py-5">

        <div class="container container_center px-5">

            <div class="row gx-5 justify-content-center">

                <!-- Title -->
                <h1 class="text-center display-5 fw-bolder mb-2 animate__animated animate__zoomIn my-3">
                    Stok
                </h1>

                <div class="col-lg-12 mt-5">
                    <!-- Card -->
                    <div class="card-border-0">
                        <!-- Cardhead -->
                        <div class="card-header">
                            <a href="{{ route('stock.create') }}" class="btn btn-outline-dark mx-2">
                                Create
                                <i class="fas fa-circle-plus"></i>
                            </a>
                        </div>

                        <!-- Cardbody -->
                        <div class="card-body overflow-auto my-3" style="width: 100%;" align="center">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card QA_section border-0">
                                        <div class="card-body QA_table ">
                                            <div class="table-responsive shopping-cart">
                                                <table class="table mb-0 text-center">
                                                    <thead class="">
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
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td class="text-start"><img src="{{ asset('storage/' . $stock->product_img) }}" alt="" height="100">
                                                                    <p class="d-inline-block align-middle mb-0"><span
                                                                        class="text-muted font_s_13">{{ $stock->product_name }}</span>
                                                                    </p>
                                                                </td>
                                                                <td>Rp{{ number_format($stock->price, 2, ",", ".") }}</td>
                                                                <td>{{ $stock->quantity }}</td>
                                                                <td>Rp{{ number_format($stock->total, 2, ",", ".") }}</td>
                                                                <td>
                                                                    <a href="{{ route('stock.edit', $stock->id) }}" class="text-dark"><i class="far fa-pen-to-square"></i></a>
                                                                    <form action="{{ route('stock.destroy', $stock->id) }}" method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="text-dark border-0" type="submit"><i class="fas fa-trash"></i></button>
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

@endsection
