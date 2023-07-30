<!DOCTYPE html>
<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">
  <meta property="og:title" content="blogging Website"/>
  <meta property="og:type" content="website" />
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="300">
  <meta property="og:image:height" content="300">
  <title></title>
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
  <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
  <!-- PLUGINS CSS STYLE -->
  <link href="{{ asset('resources/dashboard_files/assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="{{ asset('resources/style_files/backend/css/sleek.css') }}" />
  <!-- FAVICON -->
  <link href="{{ asset('resources/dashboard_files/assets/img/favicon.png') }}" rel="shortcut icon" />
  <script src="{{ asset('resources/style_files/backend/plugins/nprogress/nprogress.js') }}"></script>
</head>

</head>
  <body class="" id="body">
{{-- ====================================================================== --}}
{{-- ============================= Start Content ========================== --}}
{{-- ====================================================================== --}}
@yield('content')
{{-- ====================================================================== --}}
{{-- ============================= End Content ============================ --}}
{{-- ====================================================================== --}}


