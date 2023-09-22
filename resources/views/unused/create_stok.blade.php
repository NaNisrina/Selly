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
                            <a href="{{ route('stok.index') }}" class="btn btn-outline-dark mx-2">
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

                                                <form class="requires-validation" novalidate>

                                                    <div class="col-md-12" style="width: 22rem;">
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">@</div>
                                                            </div>
                                                        <input class="form-control" type="text" name="name"
                                                            placeholder="Name" required>
                                                        <div class="valid-feedback">Name field is valid!</div>
                                                        <div class="invalid-feedback">Name field cannot be blank!</div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <select class="form-select mt-3" style="width: 22rem;" required>
                                                            <option selected disabled value="">Product</option>
                                                            <option value="jweb">Salad</option>
                                                            <option value="sweb">Nugget</option>
                                                            <option value="pmanager">Commission</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-outline mt-3" style="width: 22rem;">
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">Pc</div>
                                                            </div>
                                                        <input type="number" id="typeNumber" class="form-control"
                                                            placeholder="Quantity" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-outline mt-3" style="width: 22rem;">
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">Rp</div>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                id="inlineFormInputGroup" placeholder="Price">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 mt-3">
                                                        <label class="mb-3 mr-1" for="status">Status: </label>

                                                        <input type="radio" class="btn-check" name="status"
                                                            id="Not Paid" autocomplete="off" required>
                                                        <label class="btn btn-sm btn-outline-danger" for="Not Paid">Not
                                                            Paid</label>

                                                        <input type="radio" class="btn-check" name="status"
                                                            id="Minus" autocomplete="off" required>
                                                        <label class="btn btn-sm btn-outline-warning"
                                                            for="Minus">Minus</label>

                                                        <input type="radio" class="btn-check" name="status"
                                                            id="Paid" autocomplete="off" required>
                                                        <label class="btn btn-sm btn-outline-success"
                                                            for="Paid">Paid</label>
                                                        <div class="valid-feedback mv-up">You selected a status!</div>
                                                        <div class="invalid-feedback mv-up">Please select a status!</div>
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

@endsection
