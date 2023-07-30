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
                    <h1>Add</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.users-index') }}">
                                    <span class="mdi mdi-home"></span> Users
                                </a>
                            </li>

                            <li class="breadcrumb-item">
                                <i class="fas fa-users-cog"></i>Add Users
                            </li>
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
                                        {{-- <h2 style="color:white;"><i class="mdi mdi-star mdi-spin"></i> طلبات سحب الرصيد : </h2> --}}
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('super_admin.users-store') }}" method="POST"
                                            enctype="multipart/form-data" id="createForm">
                                            @csrf
                                            <div class="form-row">


                                                {{-- Name  --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3" for="username"> Name :
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
                                                            value="{!! old('name') ? old('name') : null !!}">
                                                    </div>
                                                </div>




                                                {{-- Email  --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3" for="email">
                                                        Email:
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
                                                            value="{!! old('email') ? old('email') : null !!}">
                                                    </div>
                                                </div>





                                                {{--  Password  --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3" for="password">
                                                        Password : <strong class="text-danger">
                                                            *
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
                                                            id="password" placeholder="Password ">
                                                    </div>
                                                </div>


                                                {{-- Password confirmation --}}
                                                <div class="col-md-6">
                                                    <label class="text-dark font-weight-medium mb-3" for="Rpassword">
                                                        Password confirmation : <strong class="text-danger">
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
                                                            id="Rpassword" placeholder="Password confirmation">
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
                                                                @if (old('role') == 1) selected @endif>Admin
                                                            </option>
                                                            <option value="2"
                                                                @if (old('role') == 2) selected @endif>Editor
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>




                                                <div class="col-md-12 mb-3">
                                                    <button class="mdi btn btn-primary" type="submit"><span
                                                            class="mdi mdi-plus"></span>Add</button>
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
