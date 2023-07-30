@extends('admin.layouts.app')

@section('admin_css')
    {{-- <link href="{{ asset('style_files/backend/plugins/data-tables/datatables.bootstrap4.min.css') }}"
        rel="stylesheet"> --}}
    {{-- <link href="{{ asset('dashboard_files/assets/css/sleek.min.css') }}"> --}}
    {{-- <link href="{{ asset('style_files/backend/css/sleek.css') }}"> --}}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">
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

            {{-- ============================================== --}}
            {{-- ================== Header ==================== --}}
            {{-- ============================================== --}}
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Categories</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span> Dashboard
                                </a>
                            </li>

                            <li class="breadcrumb-item">
                                <i class="fas fa-users-cog"></i> Categories
                            </li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('super_admin.categories-create') }}" class="mb-1 btn btn-primary"><i
                            class="mdi mdi-playlist-plus"></i>Add </a>




                    <a href="{{ route('super_admin.categories-showSoftDelete') }}" class="mb-1 btn btn-danger"><i
                            class="mdi mdi-delete"></i> Archive</a>

                </div>
            </div>
            {{-- ============================================== --}}
            {{-- =================== Body ===================== --}}
            {{-- ============================================== --}}
            <div class="card card-default">
                <div class="card-header justify-content-between " style="background-color: #4c84ff;"></div>
                <div class="card-body">
                    <table id="hoverable-data-table" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center">Title</th>
                                <th style="text-align: center"> Status</th>

                                <th style="text-align: center">Image</th>

                                <th style="text-align: center"><i class="mdi mdi-clock-outline mdi-spin"></i> Time </th>
                                <th style="text-align: center"><i class="mdi mdi-settings mdi-spin"></i> control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($categories) && $categories->count() > 0)
                                @foreach ($categories as $category)
                                    <tr>
                                        <td style="text-align: center">{!! isset($category->title) ? $category->title : "<span style='color:blue;'>----------</span>" !!} </td>

                                        <td style="text-align: center">{!! isset($category->status) ? $category->status : "<span style='color:red;'>Undefined</span>" !!} </td>


                                        <td style="text-align: center">
                                            @if (isset($category->image) &&
                                                    $category->getRawOriginal('image') &&
                                                    file_exists($category->getRawOriginal('image')))
                                                    <img src="{{ asset($category->image) }}" width="100"
                                                        height="100"
                                                        style="border-radius: 10px; border:solid 1px black;">
                                                @else
                                                    <img src="{{  asset('style_files/frontend/img/default_filet.png') }}"
                                                        width="100" height="100"
                                                        style="border-radius: 10px; border:solid 1px black;">
                                                @endif


                                        </td>

                                        <td style="text-align: center">
                                            {!! isset($category->created_at) ? $category->created_at : "<span style='color:red;'>Undefined</span>" !!}
                                        </td>
                                        <td style="text-align: center">

                                            <a href="{{ route('super_admin.categories-edit',$category->id ? $category->id : -1) }}"
                                                class="mb-1 btn btn-sm btn-success"><i
                                                    class="mdi mdi-playlist-edit"></i></a>
                                            <a href="{{ route('super_admin.categories-softDelete',$category->id ? $category->id : -1) }}"
                                                class="confirm mb-1 btn btn-sm btn-danger"><i
                                                    class="mdi mdi-delete"></i></a>
                                                    <a href="{{ route('super_admin.categories-activeInactiveSingle', [isset($category->id) ? $category->id : -1]) }}"
                                                        class="process mb-1 btn btn-sm btn-warning" title="Active / Inactive"><i
                                                            class="mdi mdi-stop"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        @endsection

        @section('admin_javascript')
            <script>
                jQuery(document).ready(function() {
                    jQuery('#hoverable-data-table').DataTable({
                        "aLengthMenu": [
                            [20, 30, 50, 75, -1],
                            [20, 30, 50, 75, "All"],
                        ],
                        "pageLength": 20,
                        "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
                        "order": [
                            [6, "desc"]
                        ]
                    });
                });
            </script>
            <script src="{{ asset('style_files/backend/plugins/data-tables/jquery.datatables.min.js') }}"></script>
            <script src="{{ asset('style_files/backend/plugins/data-tables/datatables.bootstrap4.min.js') }}"></script>
        @endsection
