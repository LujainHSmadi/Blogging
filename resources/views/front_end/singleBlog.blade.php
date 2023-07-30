    {{-- Header section include --}}

    @include('front_end.layout.header')

    <body>
        {{-- Top section include --}}
        @include('front_end.layout.top')


    <!-- Single Post Section Begin -->
    <section class="single-post spad">
        @if (isset($blog))

        <div class="single-post__hero set-bg"
            data-setbg="{{ asset($blog->image) }}">
        </div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="single-post__title">
                        <div class="single-post__title__meta">
                            <h4>{{ $blog->created_at->format('d') }}</h4>
                            <span>{{ $blog->created_at->format('m') }}</span>
                        </div>
                        <div class="single-post__title__text">
                            <ul class="label">
                                <li>{{ $blog->category->title }}</li>
                            </ul>
                            <h4>{{ $blog->title }}</h4>
                            <ul class="widget">
                                <li>by {{ $blog->user->role }}</li>
                                <li>{{ $blog->created_at->diffForHumans() }}</li>
                            </ul>
                        </div>
                    </div>

                    <div class="single-post__top__text">
                        <p>{{ $blog->description }}</p>
                    </div>
                </div>
            </div>
        </div>

        @endif
    </section>
    <!-- Single Post Section End -->

    {{-- Footer section include --}}
    @include('front_end.layout.footer')
</body>

</html>
