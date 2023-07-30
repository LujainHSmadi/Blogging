<!DOCTYPE html>
{{-- <html lang="ar" dir='rtl'> --}}
<html  @if (Config::get('app.locale') == 'en') lang="en" dir='ltr' @elseif(Config::get('app.locale') == 'ar') lang="ar" dir='rtl' @else lang="en" dir='ltr' @endif>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description"
        content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">


        <meta property="og:title" content="Blogging Website"/>
        <meta property="og:type" content="website" />
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="300">
        <meta property="og:image:height" content="200">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        {{-- <meta property="og:description" content="Your description."/>   --}}

    <title>Blogging | Admin Dashboard</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
        rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('style_files/backend/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    

    @if (Config::get('app.locale') == 'en') 
        <!-- SLEEK CSS LTR (EN): -->
        <link id="sleek-css" rel="stylesheet" href="{{ asset('style_files/backend/css/sleek.css') }}" />
    @elseif(Config::get('app.locale') == 'ar')
        <!-- SLEEK CSS RTL (AR) : -->
        <link id="sleek-css" rel="stylesheet" href="{{ asset('dashboard_files/assets/css/sleek.rtl.css') }}" />
    @else
        <!-- SLEEK CSS LTR (EN): -->
        <link id="sleek-css" rel="stylesheet" href="{{ asset('style_files/backend/css/sleek.css') }}" />
    @endif

    {{--  --}}
    <link href="{{ asset('style_files/backend/plugins/data-tables/datatables.bootstrap4.min.css') }}"
        rel="stylesheet">

    <!-- FAVICON -->
    <link href="{{ asset('dashboard_files/assets/img/favicon.png') }}" rel="shortcut icon" />

    {{-- Sweet Alert --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous"></script>

    <script src="{{ asset('style_files/backend/plugins/nprogress/nprogress.js') }}"></script>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    @yield('admin_css')
    {{-- ========================================================== --}}
    {{-- =============== Live Select Search Section =============== --}}
    {{-- ========================================================== --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    {{-- ========================================================== --}}
    {{-- =============== Live Select Search Section =============== --}}
    {{-- ========================================================== --}}
</head>

<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>
    <div id="toaster"></div>

