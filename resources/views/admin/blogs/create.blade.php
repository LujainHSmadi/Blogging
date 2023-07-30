        @extends('admin.layouts.app')

        @section('admin_css')
            <link href="{{ asset('dashboard_files/assets/plugins/data-tables/datatables.bootstrap4.min.css') }}"
                rel="stylesheet">
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

                        <div>
                            <h1>Add</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb p-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('super_admin.blogs-index') }}">
                                            <span class="mdi mdi-home"></span> Blogs
                                        </a>
                                    </li>

                                    <li class="breadcrumb-item">
                                        <i class="fas fa-blogs-cog"></i>Add Blogs
                                    </li>
                                </ol>
                            </nav>
                        </div>

                        <div class="content-wrapper">
                            <div class="content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card card-default">
                                            <div class="card-header justify-content-between "
                                                style="background-color: #4c84ff;">
                                            </div>
                                            <div class="card-body">
                                                <form id="createForm" action="{{ route('super_admin.blogs-store') }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-row">


                                                        {{-- title  --}}
                                                        <div class="col-md-6">
                                                            <label class="text-dark font-weight-medium mb-3" for="title">
                                                                Title :
                                                                <strong class="text-danger">
                                                                    *
                                                                    @error('title')
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
                                                                <input type="text" name="title"
                                                                    class="form-control @error('title') is-invalid @enderror"
                                                                    id="title" placeholder="title"
                                                                    value="{!! old('title') ? old('title') : null !!}">
                                                            </div>
                                                        </div>
                                                        {{-- Category --}}
                                                        <div class="col-md-6 mb-3">
                                                            <div class="form-group">
                                                                <label for="category_id">Category
                                                                    <strong class="text-danger">* @error('category_id')
                                                                            ( {{ $message }} )
                                                                        @enderror
                                                                    </strong>
                                                                </label>
                                                                <select name="category_id" id="category_id"
                                                                    class="category_id custom-select my-1 mr-sm-2 @error('category_id') is-invalid @enderror form-control"
                                                                    data-live-search="true" data-width="88%"
                                                                    data-actions-box="true" style="width: 100%">
                                                                    <option value="" selected>Choose Category ...
                                                                    </option>
                                                                    @if (isset($categories) && $categories->count() > 0)
                                                                        @foreach ($categories as $category)
                                                                            <option value="{{ $category->id }}"
                                                                                @if (old('category_id') != null) @if (old('category_id') == $category->id) selected @endif
                                                                            @else
                                                                                @if ($category->category_id == $category->id) selected @endif
                                                                                @endif>

                                                                                {{ isset($category->title) ? $category->title : '------' }}

                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>


                                                        {{-- Image --}}
                                                        <div class="col-md-6 mb-3" id="image_div">
                                                            <label class="text-dark font-weight-medium mb-3" for="image">
                                                                Image:
                                                                <strong class="text-danger">
                                                                    * @error('image')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </strong></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span
                                                                        class="input-group-text mdi mdi-cloud-upload"></span>
                                                                </div>
                                                                <input type="file" name="image" class="form-control"
                                                                    id="image">
                                                            </div>
                                                        </div>

                                                        {{-- Status --}}
                                                        <div class="col-md-6 mb-3">
                                                            <label class="text-dark font-weight-medium mb-3"
                                                                for="validationServer01">status : <strong
                                                                    class="text-danger"> *
                                                                    @error('status')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </strong></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span
                                                                        class="input-group-text mdi mdi-account-check"></span>
                                                                </div>
                                                                <select name="status"
                                                                    class="custom-select my-1 mr-sm-2 @error('status') is-invalid @enderror"
                                                                    id="inlineFormCustomSelectPref">
                                                                    <option value="" selected>status..</option>
                                                                    <option value="1"
                                                                        @if (old('status') == 1) selected @endif>
                                                                        Active
                                                                    </option>
                                                                    <option value="2"
                                                                        @if (old('status') == 2) selected @endif>
                                                                        Inactive
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        {{--  Description --}}
                                                        <div class="col-12">
                                                            <label class="text-dark font-weight-medium mb-3"
                                                                for="description">
                                                                Description : <strong class="text-danger">
                                                                    * @error('description')
                                                                        - {{ $message }}
                                                                    @enderror
                                                                </strong>
                                                            </label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">

                                                                </div>
                                                                <textarea style="width: 90% !important" name="description" class="form-control ckeditor" rows="5"
                                                                    id='description'>{{ old('description') ? old('description') : null }}</textarea>
                                                            </div>
                                                        </div>




                                                        <div class="col-md-12 mb-3">
                                                            <button class="mdi btn btn-primary" type="submit"><span
                                                                    class="mdi mdi-plus"></span>Add</button>
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
