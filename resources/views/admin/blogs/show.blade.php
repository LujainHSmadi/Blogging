@extends('admin.layouts.app')

{{-- @section('admin_css')
    <link href="{{ asset('resources/style_files/backend/plugins/data-tables/datatables.bootstrap4.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('resources/dashboard_files/assets/css/sleek.min.css') }}">
@endsection --}}

@section('content')
    {{-- =========================================================== --}}
    {{-- ================== Sweet Alert Section ==================== --}}
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

    {{-- ============================================== --}}
    {{-- ================== Header ==================== --}}
    {{-- ============================================== --}}
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1><i class="mdi mdi-information"></i> Blog Information</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('super_admin.dashboard') }}">
                            <i class="mdi mdi-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('super_admin.blogs-index') }}">
                            <i class="mdi mdi-format-list-bulleted"></i> Blogs
                        </a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page"><i class="mdi mdi-information"></i> Blog Information
                    </li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('super_admin.blogs-edit', [isset($blog->id) ? $blog->id : 'Undefined']) }}"
                class="mb-1 btn btn-primary" title="Edit"><i class="mdi mdi-playlist-edit"></i></i> Edit </a>


        </div>
    </div>

    <div class="bg-white border rounded">
        <div class="row no-gutters">


            {{-- ================================================================================================= --}}
            {{-- ========================================== Left Section ========================================= --}}
            {{-- ================================================================================================= --}}
            <div class="col-lg-12 col-xl-12">
                <div class="profile-content-right py-5">
                    {{-- ================================================================================================= --}}
                    {{-- ================================ Tabs Titles (Headers) Section ================================== --}}
                    {{-- ================================================================================================= --}}
                    <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">
                        {{-- Tab 1 --}}
                        <li class="nav-item">
                            <a class="nav-link active" id="timeline-tab" data-toggle="tab" href="#tab_1" role="tab"
                                aria-controls="tab_1" aria-selected="true"><i class="mdi mdi-information"></i> Main
                                Information </a>
                        </li>



                        {{-- ================================================================================================= --}}
                        {{-- ================================= Tabs Details (Bodies) Section ================================= --}}
                        {{-- ================================================================================================= --}}
                        <div class="tab-content px-3 px-xl-5 col-12" id="myTabContent">
                            {{-- ============================================================================== --}}
                            {{-- ================================= Tab 1 Body ================================= --}}
                            {{-- ============================================================================== --}}
                            <div class="tab-pane fade show active" id="tab_1" role="tabpanel"
                                aria-labelledby="timeline-tab">
                                {{-- ============================================== --}}
                                {{-- ============= All Error Messages ============= --}}
                                {{-- ============================================== --}}
                                <div class="mt-3">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <h3>Please correct the following errors : </h3>
                                            <hr>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>- {{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>

                                {{-- ============================================== --}}
                                {{-- ============== Main Information ============== --}}
                                {{-- ============================================== --}}
                                <div class="media mt-3 profile-timeline-media col--12">
                                    <div class="media-body">
                                        <h3 class="py-3 text-dark"><i class="mdi mdi-information"></i> Main Information:
                                        </h3>
                                        <table id="hoverable-data-table" class="table table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Blog title : <span style="color:blue;">
                                                            {!! isset($blog->title) ? $blog->title : '<span style="color:blue;">----------</span>' !!}
                                                        </span> </th>
                                                    <th>

                                                    <th>Blog's Category : <span style="color:blue;">
                                                            {!! isset($blog->category->title) ? $blog->category->title : '<span style="color:blue;">----------</span>' !!}
                                                        </span> </th>
                                                </tr>


                                                <tr>
                                                    <th>User : <span style="color:blue;">
                                                            {!! isset($blog->user->name) ? $blog->user->name : '<span style="color:blue;">----------</span>' !!}
                                                        </span> </th>
                                                    <th>

                                                    <th>Date : <span style="color:blue;">
                                                            {!! isset($blog->created_at) ? date('Y.d.m / h:i A', strtotime($blog->created_at)) : '--------' !!}
                                                        </span> </th>
                                                </tr>








                                            </thead>
                                        </table>


                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2>
                                                    <div
                                                        style="border:solid 1px black; border-radius:10px; padding:10px;text-align: center">


                                                        <h3 style="text-align: center; color: black">
                                                            Description
                                                        </h3>
                                                        <hr>

                                                        <span style="color:blue;">{!! isset($blog->description) ? $blog->description : "<span class='mainColor'>----------</span>" !!}</span>
                                                    </div>
                                                </h2>
                                            </div>
                                        </div>


                                        <div class="row mt-2">
                                            <div class="col-md-12">
                                                <h2>
                                                    <div
                                                        style="border:solid 1px black; border-radius:10px; padding:10px;text-align: center">


                                                        <h4 style="padding-bottom: 10px; color: black">Blog image</h4>
                                                        @if (isset($blog->image) && $blog->getRawOriginal('image') && file_exists($blog->getRawOriginal('image')))
                                                            <img src="{{ asset($blog->image) }}"
                                                                style="border-radius: 10px; border:solid 1px black;width: 300px;
                                                                        height: 200px;">
                                                        @else
                                                            <img src="{{ asset('style_files/frontend/img/default_filet.png') }}"
                                                                style="border-radius: 10px; border:solid 2px black; width: 300px; height: 200px;">
                                                        @endif
                                                    </div>
                                                </h2>
                                            </div>
                                        </div>


                                    </div>
                                </div>



                            </div>


                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('admin_javascript')
    <script src="{{ asset('style_files/backend/plugins/data-tables/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('style_files/backend/plugins/data-tables/datatables.bootstrap4.min.js') }}"></script>
@endsection
