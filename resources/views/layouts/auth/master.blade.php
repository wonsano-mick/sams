<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('images/logo/Logo.jpg') }}">

    <title>@yield('title', '')</title>

    {{-- Vendors Style --}}
    <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

    {{-- Style   --}}
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/myStyle.css') }}">

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </div>


    {{-- Vendor JS  --}}
    <script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
    {{-- SweetAlert JS --}}
    <script src="{{ asset('frontend/js/SweetAlert.js') }}"></script>


</body>

</html>
