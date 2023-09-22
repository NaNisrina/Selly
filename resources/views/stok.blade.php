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
                        {{-- <div class="card-header">
                            <a href="{{ route('stok.create') }}" class="btn btn-outline-dark mx-2">
                                Edit
                                <i class="fas fa-pen-to-square"></i>
                            </a>
                        </div> --}}

                        <!-- Cardbody -->
                        <div class="card-body overflow-auto my-3" style="width: 100%;" align="center">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card QA_section border-0">
                                        <div class="card-body QA_table ">
                                            <div class="table-responsive shopping-cart">
                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-top-0">Product</th>
                                                            <th class="border-top-0">Price</th>
                                                            <th class="border-top-0">Quantity</th>
                                                            <th class="border-top-0">Total</th>
                                                            <th class="border-top-0">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <td><img src="/img/im fine.jpg" alt="" height="100">
                                                                <p class="d-inline-block align-middle mb-0"><a
                                                                        href=""
                                                                        class="d-inline-block align-middle mb-0 f_s_16 f_w_600 color_theme2">
                                                                        Menu 1</a><br><span
                                                                        class="text-muted font_s_13">Salad</span>
                                                                </p>
                                                            </td>
                                                            <td>Rp7.000</td>
                                                            <td><input class="form-control w-25" type="number"
                                                                    value="2" id="example-number-input1"></td>
                                                            <td>Rp7.000</td>
                                                            <td><a href="" class="text-dark"><i
                                                                        class="far fa-pen-to-square"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><img src="/img/what duck.jpg" alt="" height="100">
                                                                <p class="d-inline-block align-middle mb-0"><a
                                                                        href=""
                                                                        class="d-inline-block align-middle mb-0 f_s_16 f_w_600 color_theme2">
                                                                        Menu 2</a><br><span
                                                                        class="text-muted font_s_13">Nugget</span>
                                                                </p>
                                                            </td>
                                                            <td>Rp5.000</td>
                                                            <td><input class="form-control w-25" type="number"
                                                                    value="2" id="example-number-input2"></td>
                                                            <td>Rp5.000</td>
                                                            <td><a href="" class="text-dark"><i
                                                                        class="far fa-pen-to-square"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><img src="/img/samoyed.jpg" alt="" height="100">
                                                                <p class="d-inline-block align-middle mb-0"><a
                                                                        href=""
                                                                        class="d-inline-block align-middle mb-0 f_s_16 f_w_600 color_theme2">
                                                                        Menu 3</a><br><span
                                                                        class="text-muted font_s_13">Commission</span></p>
                                                            </td>
                                                            <td>Rp12.000</td>
                                                            <td><input class="form-control w-25" type="number"
                                                                    value="1" id="example-number-input3"></td>
                                                            <td>Rp12.000</td>
                                                            <td><a href="" class="text-dark"><i
                                                                        class="far fa-pen-to-square"></i></a></td>
                                                        </tr>

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
