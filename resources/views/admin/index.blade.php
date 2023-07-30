@extends('admin.layouts.app')

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
    <div class="row">
        @if (auth()->user()->role == 'Admin')
        {{-- Users --}}
        <div class="col-md-4">
            <div class="card card-mini mb-4">
                <div class="card-body text-center">
                    <div class="col-md-12">
                        <div class="row"
                            style="border:solid 1px black; border-radius:10px; background-color:rgb(243, 243, 243);">
                            <div class="col-md-12 p-2">
                                <h2 class="mb-1">
                                    ( {{ isset($users) ? $users->count() : 0 }} )
                                </h2>
                                <br>
                                <h5 class="mb-2">
                                    <a href="{{ route('super_admin.users-index') }}" style="color:blue;">
                                        Users</a>
                                </h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        {{-- Categories --}}
        <div class="col-md-4">
            <div class="card card-mini mb-4">
                <div class="card-body text-center">
                    <div class="col-md-12">
                        <div class="row"
                            style="border:solid 1px black; border-radius:10px; background-color:rgb(243, 243, 243);">
                            <div class="col-md-12 p-2">
                                <h2 class="mb-1">
                                    ( {{ isset($categories) ? $categories->count() : 0 }} )
                                </h2>
                                <br>
                                <h5 class="mb-2">
                                    <a href="{{ route('super_admin.categories-index') }}" style="color:blue;">
                                        Categories</a>
                                </h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Blogs --}}
        <div class="col-md-4">
            <div class="card card-mini mb-4">
                <div class="card-body text-center">
                    <div class="col-md-12">
                        <div class="row"
                            style="border:solid 1px black; border-radius:10px; background-color:rgb(243, 243, 243);">
                            <div class="col-md-12 p-2">
                                <h2 class="mb-1">
                                    ( {{ isset($blogs) ? $blogs->count() : 0 }} )
                                </h2>
                                <br>
                                <h5 class="mb-2">
                                    <a href="{{ route('super_admin.blogs-index') }}" style="color:blue;">
                                        Blogs</a>
                                </h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
