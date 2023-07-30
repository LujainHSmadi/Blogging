    {{-- Header section include --}}

    @include('front_end.layout.header')

    <body>
        {{-- Top section include --}}
        @include('front_end.layout.top')


    <!-- Categories Section Begin -->
    <section class="categories categories-grid spad">
        <div class="categories__post">
            <div class="container">
                <div class="categories__grid__post">
                    <div class="row">
                        <div class="col-lg-10 col-md-10">
                            <div class="breadcrumb__text">
                                <h2>Blogs: <span>{{ $category->title ? $category->title : Category }}</span></h2>
                                <div class="breadcrumb__option">
                                    <a href="{{ route('welcome') }}">Home</a>
                                    <span>Blogs</span>
                                </div>
                            </div>


                            @if(isset($blogs) && count($blogs)>0)
                            @foreach ($blogs as $blog )
                            <div class="categories__list__post__item">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="categories__post__item__pic set-bg"
                                            data-setbg="{{ asset($blog->image) }}">
                                            <div class="post__meta">
                                                <h4>{{ $blog->created_at->format('d') }}</h4>
                                                <span>{{ $blog->created_at->format('m') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="categories__post__item__text">
                                            <h3><a href="{{ route('singleBlog',isset($blog->id) ? $blog->id : -1) }}">{{ $blog->title}}</a>
                                            </h3>
                                            <ul class="post__widget">
                                                <li>by <span>{{ $blog->user->role }}</span></li>
                                                <li>{{ $blog->created_at->diffForHumans() }}</li>
                                            </ul>
                                            <p> {{ Str::limit($blog->description, 100) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                                @else
                            </div>
                            <div class="categories__list__post__item">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="categories__post__item__pic set-bg"
                                            data-setbg="{{ asset('front_end/style_files/img/categories/categories-list/cl-6.jpg') }}">
                                            <div class="post__meta">
                                                <h4>{{ $blog->created_at->format('d') }}</h4>
                                                <span>{{ $blog->created_at->format('m') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="categories__post__item__text">
                                            <h3><a href="#">A 5-Minute Peach Mug Cobbler That Just So Happens to...</a>
                                            </h3>
                                            <ul class="post__widget">
                                                <li>by <span>Admin</span></li>
                                                <li>3 min read</li>
                                            </ul>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt dolore magna aliqua. Quis ipsum suspendisse ultrices
                                                gravida...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="categories__list__post__item">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="categories__post__item__pic set-bg"
                                            data-setbg="{{ asset('front_end/style_files/img/categories/categories-list/cl-7.jpg') }}">
                                            <div class="post__meta">
                                                <h4>08</h4>
                                                <span>Aug</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="categories__post__item__text">

                                            <h3><a href="#">Fresh Herb Polenta with Parsnip Chips and Maple Butter</a>
                                            </h3>
                                            <ul class="post__widget">
                                                <li>by <span>Admin</span></li>
                                                <li>3 min read</li>
                                            </ul>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt dolore magna aliqua. Quis ipsum suspendisse ultrices
                                                gravida...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="categories__list__post__item">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="categories__post__item__pic set-bg"
                                            data-setbg="{{ asset('front_end/style_files/img/categories/categories-list/cl-7.jpg') }}">
                                            <div class="post__meta">
                                                <h4>08</h4>
                                                <span>Aug</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="categories__post__item__text">

                                            <h3><a href="#">Fresh Herb Polenta with Parsnip Chips and Maple Butter</a>
                                            </h3>
                                            <ul class="post__widget">
                                                <li>by <span>Admin</span></li>
                                                <li>3 min read</li>
                                            </ul>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt dolore magna aliqua. Quis ipsum suspendisse ultrices
                                                gravida...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            @endif
                            <div class="row">
                                <div class="col-lg-12">
                                        {!! $blogs->links() !!}

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->


{{-- Footer section include --}}
    @include('front_end.layout.footer')
</body>

</html>
