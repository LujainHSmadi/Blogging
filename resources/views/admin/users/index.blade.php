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
                    <h1>Users</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span>  Dashboard
                                </a>
                            </li>

                            <li class="breadcrumb-item">
                                <i class="fas fa-users-cog"></i> Users
                            </li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('super_admin.users-create') }}" class="mb-1 btn btn-primary"><i
                            class="mdi mdi-playlist-plus"></i>Add </a>




                    <a href="{{ route('super_admin.users-showSoftDelete')}}" class="mb-1 btn btn-danger"><i
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
                                <th style="text-align: center"> User name</th>
                                <th style="text-align: center"> Email</th>

                                <th style="text-align: center">Role</th>

                                <th style="text-align: center"><i class="mdi mdi-clock-outline mdi-spin"></i> Time </th>
                                <th style="text-align: center"><i class="mdi mdi-settings mdi-spin"></i> control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($users) && $users->count() > 0)
                                @foreach ($users as $user)
                                    <tr>
                                        <td style="text-align: center">{!! isset($user->name) ? $user->name : "<span style='color:blue;'>----------</span>" !!} </td>
                                        <td style="text-align: center">
                                            {!! isset($user->email) ? $user->email : "<span style='color:blue;'>----------</span>" !!}
                                            <br>

                                        </td>
                                        <td style="text-align: center">{!! isset($user->role) ? $user->role : "<span style='color:red;'>Undefined</span>" !!} </td>



                                        <td style="text-align: center">
                                            {!! isset($user->created_at) ? $user->created_at : "<span style='color:red;'>Undefined</span>" !!}
                                        </td>
                                        <td style="text-align: center">

                                            <a href="{{ route('super_admin.users-edit',$user->id ? $user->id : -1) }}"
                                                class="mb-1 btn btn-sm btn-success"><i
                                                    class="mdi mdi-playlist-edit"></i></a>
                                                    @if($user->role != 'Admin')
                                                    <a href="{{ route('super_admin.users-softDelete',$user->id ? $user->id : -1) }}"
                                                        class="confirm mb-1 btn btn-sm btn-danger"><i
                                                            class="mdi mdi-delete"></i></a>
                                                    @endif


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
                            [3, "desc"]
                        ]
                    });
                });
            </script>
            <script src="{{ asset('style_files/backend/plugins/data-tables/jquery.datatables.min.js') }}"></script>
            <script src="{{ asset('style_files/backend/plugins/data-tables/datatables.bootstrap4.min.js') }}"></script>
        @endsection
