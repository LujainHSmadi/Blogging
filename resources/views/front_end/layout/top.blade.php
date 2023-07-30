     {{-- =========================================================== --}}
     {{-- ====================== Sweet Alert ======================== --}}
     {{-- =========================================================== --}}
     <div>
         @if (session()->has('success'))
             <script>
                 swal("Great Job !!!", "{!! Session::get('success') !!}", "success", {
                     button: "OK",
                 });
             </script>
         @endif
         @if (session()->has('danger'))
             <script>
                 swal("Oops !!!", "{!! Session::get('danger') !!}", "error", {
                     button: "Close",
                 });
             </script>
         @endif
     </div>
     <!-- Page Preloder -->
     <div id="preloder">
         <div class="loader"></div>
     </div>

     <!--================nav menu ============ -->
     <!--================nav menu ============ -->
     <!--================nav menu ============ -->
     <div class="humberger__menu__overlay"></div>
     <div class="humberger__menu__wrapper">
         <div class="humberger__menu__logo">
             <a href="{{ route('welcome') }}">
                 <h2>Blogging</h2>
             </a>
         </div>
         <nav class="humberger__menu__nav mobile-menu">
             <ul>
                 <li><a href="{{ route('welcome') }}">Home</a></li>
                 <li class="dropdown"><a href="#">Categories</a>
                     <ul class="dropdown__menu">
                         @if (isset($categories) && count($categories) > 0)
                             @foreach ($categories as $category)
                                 <li><a href="{{ route('blogsList', $category->id) }}">{{ $category->title }}</a></li>
                             @endforeach

                         @endif
                     </ul>
                 </li>
             </ul>
         </nav>
         <div id="mobile-menu-wrap"></div>


     </div>
     <!-- Humberger End -->

     <!-- Header Section Begin -->
     <header class="header">
         <div class="header__top">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-2 col-md-1 col-6 order-md-1 order-1">
                         <div class="header__humberger">
                             <i class="fa fa-bars humberger__open"></i>
                         </div>
                     </div>
                     <div class="col-lg-8 col-md-10 order-md-2 order-3">
                         <nav class="header__menu">
                             <ul>
                                 <li class="active"><a href="{{ route('welcome') }}">Home</a></li>

                                 <li class="dropdown"><a href="#">Categories</a>
                                     <ul class="dropdown__menu">
                                         @if (isset($categories) && count($categories) > 0)
                                             @foreach ($categories as $category)
                                                 <li><a
                                                         href="{{ route('blogsList', $category->id) }}">{{ $category->title }}</a>
                                                 </li>
                                             @endforeach

                                         @endif
                                     </ul>
                                 </li>
                             </ul>
                         </nav>
                     </div>

                 </div>
             </div>
         </div>
         <div class="container">
             <div class="row">
                 <div class="col-lg-3 col-md-3">

                 </div>
                 <div class="col-lg-6 col-md-6">
                     <div class="header__logo">
                         <a href="{{ route('welcome') }}">

                             <h2>Blogging</h2>
                         </a>
                     </div>
                 </div>

             </div>
         </div>
     </header>
