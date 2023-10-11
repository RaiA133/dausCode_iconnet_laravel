<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

        <title>{{ $title }} - Iconnet</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
        <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
        {{-- <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"> --}}
        {{-- <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet"> --}}
        {{-- <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet"> --}}
        {{-- <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet"> --}}
        
        <!-- Template Main CSS File -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
        
        <!-- CSS EXTERNAL MANUAL -->
        <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    </head>

    <body data-bs-theme="light" class="too">

        <main id="main" class="main">

            @include('include.nav')
            @include('include.sidebar')

            <div>
                @yield('content')
            </div>

        </main>






        <section aria-details="link script js">
                    
            <!-- Vendor JS Files -->

            <link href="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" rel="stylesheet">
            <link href="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}" rel="stylesheet">
            <link href="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}" rel="stylesheet">
            
            {{-- <script src="assets/vendor/apexcharts/apexcharts.min.js"></script> --}}
            {{-- <script src="assets/vendor/chart.js/chart.umd.js"></script> --}}
            {{-- <script src="assets/vendor/echarts/echarts.min.js"></script> --}}
            {{-- <script src="assets/vendor/quill/quill.min.js"></script> --}}
            {{-- <script src="assets/vendor/php-email-form/validate.js"></script> --}}
            
            <!-- Template Main JS File -->
            <script src="{{ asset('assets/js/main.js') }}" rel="stylesheet"> </script>

            {{-- SCRIPTKU --}}
            

            {{-- SCRIPT UNTUK KIRIM VAR JS KE CONTROLLER --}}
            {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
            
            
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"></script>
        </section>
    </body>
</html>