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
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <!-- Tablebody -->
                                <tbody>
                                    <!-- 1 -->
                                    <tr>
                                        <td>1</td>
                                        <td>Customer 1</td>
                                        <td>Salad</td>
                                        <td>1pcs</td>
                                        <td>Rp7.000</td>

                                        <td>
                                            <a class="btn btn-success text-white">
                                                <i class="fas fa-check"></i>
                                                Paid
                                            </a>
                                        </td>

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
                                    <!-- 2 -->
                                    <tr>
                                        <td>2</td>
                                        <td>Customer 2</td>
                                        <td>Nugget</td>
                                        <td>1pcs</td>
                                        <td>Rp5.000</td>

                                        <td>
                                            <a class="btn btn-warning text-white">
                                                <i class="fas fa-check"></i>
                                                Minus
                                            </a>
                                        </td>

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
                                    <!-- 3 -->
                                    <tr>
                                        <td>3</td>
                                        <td>Customer 3</td>
                                        <td>Commission</td>
                                        <td>1pcs</td>
                                        <td>Rp12.000</td>

                                        <td>
                                            <a class="btn btn-danger text-white">
                                                <i class="fas fa-check"></i>
                                                Not Paid
                                            </a>
                                        </td>

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
                                    <!-- 4 -->
                                    <tr>
                                        <td>4</td>
                                        <td>Customer 4</td>
                                        <td>Nugget</td>
                                        <td>1pcs</td>
                                        <td>Rp5.000</td>

                                        <td>
                                            <a class="btn btn-warning text-white">
                                                <i class="fas fa-check"></i>
                                                Minus
                                            </a>
                                        </td>

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
                                    <!-- 5 -->
                                    <tr>
                                        <td>5</td>
                                        <td>Customer 5</td>
                                        <td>Salad</td>
                                        <td>1pcs</td>
                                        <td>Rp7.000</td>

                                        <td>
                                            <a class="btn btn-success text-white">
                                                <i class="fas fa-check"></i>
                                                Paid
                                            </a>
                                        </td>

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
