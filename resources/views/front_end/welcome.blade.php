    {{-- Header section include --}}

@include('front_end.layout.header')

<body>
    {{-- Top section include --}}
    @include('front_end.layout.top')


    <!-- Categories Section Begin -->
    <section class="categories spad">
        <div class="container">
            <div class="row">
                @if (isset($categories) && count($categories) > 0)

                @foreach ($categories as $category )

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="{{ route('blogsList',isset($category->id)? $category->id : -1) }}">
                        <div class="categories__item set-bg" data-setbg="{{ asset('front_end/style_files/img/categories/cat-1.jpg') }}">
                            <div class="categories__hover__text">
                                <h5>{{ $category->title }}</h5>
                                <p>{{$category->blogs ? $category->blogs->count()  : 0 }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                @else

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="">
                        <div class="categories__item set-bg" data-setbg="{{ asset('front_end/style_files/img/categories/cat-2.jpg') }}">
                            <div class="categories__hover__text">
                                <h5>Category</h5>
                                <p>28 Blogs</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="">
                        <div class="categories__item set-bg" data-setbg="{{ asset('front_end/style_files/img/categories/cat-3.jpg') }}">
                            <div class="categories__hover__text">
                                <h5>Category</h5>
                                <p>28 Blogs</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="">
                        <div class="categories__item set-bg" data-setbg="{{ asset('front_end/style_files/img/categories/cat-4.jpg') }}">
                            <div class="categories__hover__text">
                                <h5>Category</h5>
                                <p>28 Blogs</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="categories__item set-bg" data-setbg="{{ asset('front_end/style_files/img/categories/cat-2.jpg') }}">
                        <div class="categories__hover__text">
                            <h5>Category</h5>
                            <p>28 Blogs</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="">
                        <div class="categories__item set-bg" data-setbg="{{ asset('front_end/style_files/img/categories/cat-3.jpg') }}">
                            <div class="categories__hover__text">
                                <h5>Category</h5>
                                <p>28 Blogs</p>
                            </div>
                        </div>
                    </a>
                </div>

                @endif
            </div>
        </div>

    </section>
    <!-- Categories Section End -->
{{-- Footer section include --}}
@include('front_end.layout.footer')

</body>

</html>
