<!DOCTYPE HTML>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Megazine Template</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''/>
    <meta name='keywords' content=''/>
    <meta name='author' content=''/>

    <!-- Facebook and Twitter integration -->
    <meta property='og:title' content=''/>
    <meta property='og:image' content=''/>
    <meta property='og:url' content=''/>
    <meta property='og:site_name' content=''/>
    <meta property='og:description' content=''/>
    <meta name='twitter:title' content=''/>
    <meta name='twitter:image' content=''/>
    <meta name='twitter:url' content=''/>
    <meta name='twitter:card' content=''/>


    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel='shortcut icon' href='favicon.ico'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:300,400,700' rel='stylesheet'>

    <!-- Animate.css -->
    <link rel='stylesheet' href='{{asset('assets/css/animate.css')}}'>
    <!-- Icomoon Icon Fonts-->
    <link rel='stylesheet' href='{{asset('assets/css/icomoon.css')}}'>
    <!-- Bootstrap  -->
    <link rel='stylesheet' href='{{asset('assets/css/bootstrap.css')}}'>

    <!-- Flexslider  -->
    <link rel='stylesheet' href='{{asset('assets/css/flexslider.css')}}'>
    <!-- Magnific Popup -->
    <link rel='stylesheet' href='{{asset('assets/css/magnific-popup.css')}}'>
    <!-- Owl Carousel -->
    <link rel='stylesheet' href='{{asset('assets/css/owl.carousel.min.css')}}'>
    <link rel='stylesheet' href='{{asset('assets/css/owl.theme.default.min.css')}}'>
    <!-- Theme style  -->
    <link rel='stylesheet' href='{{asset('assets/css/style.css')}}'>

    <!-- Modernizr JS -->
    <script src='{{asset('assets/js/modernizr-2.6.2.min.js')}}'></script>

    <script src='{{asset('assets/js/respond.min.js')}}'></script>

    {{--Select2--}}
    <link href='https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css' rel='stylesheet'/>

    {{--    Datatable--}}
    <link rel='stylesheet' type='text/css' href='https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script type='text/javascript' charset='utf8'
            src='https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js'></script>
    <link rel='stylesheet' type='text/css'
          href='https://cdn.datatables.net/t/bs-3.3.6/jq-2.2.0,dt-1.10.11,cr-1.3.1,r-2.0.2/datatables.min.css'>
    <script type='text/javascript'
            src='https://cdn.datatables.net/t/bs-3.3.6/jq-2.2.0,dt-1.10.11,cr-1.3.1,r-2.0.2/datatables.min.js'></script>


    {{--Datatable pagination style--}}
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0;
            margin-left: 0;
            display: inline;
            border: 0;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            border: 0;
        }

        .pagination > li > a, .pagination > li > span {
            background-color: #ffffff
        }
    </style>
</head>
<body>
<div class='container-fluid'>
    <div class='row'>
        <div class='col-md-2'>

            <aside id='colorlib-aside' role='complementary' class='js-fullheight' style='background: #a9c1c1'>
                <h1 id='colorlib-logo'><a href='/'>Megazine</a></h1>
                <hr>
                <h1 style='float: right; margin-bottom: 40px'><a href='/admin' style='color: #536363'>Admin</a></h1>

                <nav id='colorlib-main-menu' role='navigation'>
                    <ul>
                        <li style='font-size: 20px'>
                            <a href='{{ asset('categories') }}'>Categories</a>
                        </li>
                        <li style='font-size: 20px'>
                            <a href='{{ asset('news') }}'>News</a>
                        </li>
                    </ul>
                </nav>

                <form id='logout-form' action='{{ url('logout') }}' method='POST'>
                    @csrf
                    <button type='submit' class='btn btn-danger' style='margin-left: 90px; margin-top: 60px;'>Logout
                    </button>
                </form>
            </aside>
        </div>

        @yield('content')

    </div>
</div>


<script>
    $(document).ready(function () {
        $('#table_id').DataTable();
    });

    $('#table_id').DataTable({
        'lengthMenu': [3, 5, 10, 20]
    });
</script>

<script src='https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js'></script>

@yield('script')
