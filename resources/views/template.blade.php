<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <title>@yield('page_title')</title>
</head>

<body>

    {{-- TOPBAR --}}
    <main class="flex-shrink-0">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand animate__animated animate__fadeInLeft" href="{{ route('home') }}">SELLY</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('penjualan.index') }}">Penjualan</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('stock.index') }}">Stok</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('pengeluaran.index') }}">Pengeluaran</a></li>

                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownKeuangan" href=""
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">Keuangan</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                <li><a class="dropdown-item" href="">Pemasukan</a></li>
                                <li><a class="dropdown-item" href="">Pengeluaran</a></li>
                                <li><a class="dropdown-item" href="">Alur Kas</a></li>
                            </ul>
                        </li> --}}

                    </ul>
                </div>
            </div>
        </nav>

        {{-- CONTENT --}}
        @yield('page_content')

    </main>


    <!-- Footer -->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; Selly 2023</div>
                </div>
                <div class="col-auto">
                    <a class="link-light small" href="#">Website</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#">For</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#">Sales</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- /Footer -->

    <!-- JAVASCRIPT BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- JS FONT AWESOME -->
    <script src="https://kit.fontawesome.com/2cef0251ec.js" crossorigin="anonymous"></script>

    <!-- JS -->
    <script src="js/template.js"></script>


</body>

</html>
