








































        @extends('admin.layouts.app')

@section('admin_css')
    <link href="{{ asset('dashboard_files/assets/plugins/data-tables/datatables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_files/assets/css/sleek.min.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">

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
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                {{-- ============================================== --}}
                {{-- ================== Header ==================== --}}
                {{-- ============================================== --}}
                <div>
                    <h1>update </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.users-index') }}">
                                    <span class="fa fa-th"></span> Users
                                </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">update </li>
                        </ol>
                    </nav>
                </div>

                {{-- ============================================== --}}
                {{-- ==================== Body ==================== --}}
                {{-- ============================================== --}}
                <div class="content-wrapper">
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-default">
                                    <div class="card-header justify-content-between " style="background-color: #4c84ff;">
                                    </div>
                                    <div class="card-body">
                                        <form id="createForm"
                                            action="{{ route('super_admin.users-update', isset($user->id) ? $user->id : -1) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">




                                                {{-- Name  --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3" for="username"> Name
                                                        <strong class="text-danger">
                                                            *
                                                            @error('name')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="name"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            id="username" placeholder="name"
                                                            value="{{ isset($user->name) ? $user->name : null }}">
                                                    </div>
                                                </div>

                                                {{-- Email --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3" for="email">
                                                        Email
                                                        <strong class="text-danger">
                                                            *
                                                            @error('email')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="email" name="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            id="email" placeholder="Email "
                                                            value="{{ isset($user->email) ? $user->email : null }}">
                                                    </div>
                                                </div>



                                                {{-- User Password  --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3" for="password">
                                                        password : <strong class="text-danger">

                                                            @error('password')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="password" name="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            id="password" placeholder="password">
                                                    </div>
                                                </div>


                                                {{-- Confirm Password  --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3" for="Rpassword">
                                                        Confirm Password  : <strong class="text-danger">
                                                            @error('password_confirmation')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="password" name="password_confirmation"
                                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                                            id="Rpassword" placeholder="Confirm Password ">
                                                    </div>
                                                </div>


                                                {{-- role --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Role : <strong class="text-danger"> *
                                                            @error('role')
                                                                {{ $message }}
                                                            @enderror
                                                        </strong></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-account-check"></span>
                                                        </div>
                                                        <select name="role"
                                                            class="custom-select my-1 mr-sm-2 @error('role') is-invalid @enderror"
                                                            id="inlineFormCustomSelectPref">
                                                            <option value="" selected>Choose Role...</option>
                                                            <option value="1"
                                                                @if ($user->role == 'Admin') selected @endif>Admin
                                                            </option>
                                                            <option value="2"
                                                                @if ($user->role == 'Editor') selected @endif>Editor                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <button class="mdi btn btn-primary" type="submit"><span
                                                            class="mdi mdi-plus"></span>update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
