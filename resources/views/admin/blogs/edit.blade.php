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
                        <h1>Edit </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb p-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('super_admin.dashboard') }}">
                                        <span class="mdi mdi-home"></span> Dashboard
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('super_admin.blogs-index') }}">
                                        <span class="fa fa-th"></span> Blogs
                                    </a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Edit Blog </li>
                            </ol>
                        </nav>
                    </div>

                    <div class="content-wrapper">
                        <div class="content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card card-default">
                                        <div class="card-header justify-content-between " style="background-color: #4c84ff;">
                                        </div>
                                        <div class="card-body">
                                            <form id="createForm"
                                                action="{{ route('super_admin.blogs-update', isset($blog->id) ? $blog->id : -1) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-row">

                                                    {{-- Title  --}}
                                                    <div class="col-md-6">
                                                        <label class="text-dark font-weight-medium mb-3" for="blogname"> Title
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
                                                                id="blogname" placeholder="title"
                                                                value="{{ isset($blog->title) ? $blog->title : null }}">
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
                                                                data-live-search="true" data-width="88%" data-actions-box="true"
                                                                style="width: 100%">
                                                                <option value="" selected>choose Category ...
                                                                </option>
                                                                @if (isset($blog->category_id))
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}"
                                                                            {{ $category->id == $blog->category_id ? 'selected' : '' }}>
                                                                            {{ $category->title }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>

                                                     {{-- Status --}}
                                                     <div class="col-md-6 mb-3">
                                                        <label class="text-dark font-weight-medium mb-3"
                                                            for="validationServer01">Status : <strong class="text-danger"> *
                                                                @error('status')
                                                                    {{ $message }}
                                                                @enderror
                                                            </strong></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text mdi mdi-account-check"></span>
                                                            </div>
                                                            <select name="status"
                                                                class="custom-select my-1 mr-sm-2 @error('status') is-invalid @enderror"
                                                                id="inlineFormCustomSelectPref">
                                                                <option value="" selected>Choose Status...</option>
                                                                <option value="1"
                                                                    @if (isset($blog->status) && $blog->status == 'Active') selected @endif>Active
                                                                </option>
                                                                <option value="2"
                                                                    @if (isset($blog->status) && $blog->status == 'Inactive') selected @endif>Inactive
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>



                                                     {{--  Image --}}
                                                <div class="col-md-6 mb-3" id="office">
                                                    <label class="text-dark font-weight-medium mb-3" for="image">
                                                        Image :
                                                        <strong class="text-danger">
                                                            @error('image')
                                                                {{ $message }}
                                                            @enderror
                                                        </strong></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-cloud-upload"></span>
                                                        </div>
                                                        <input type="file" name="image" class="form-control"
                                                            id="image">
                                                    </div>
                                                    @if (isset($blog->image) && $blog->getRawOriginal('image') && file_exists($blog->getRawOriginal('image')))
                                                        <img src="{{ asset($blog->image) }}" width="100"
                                                            height="100"
                                                            style="border-radius: 10px; border:solid 1px black;">
                                                    @else
                                                        <img src="{{ asset('style_files/frontend/img/default_filet.png') }}"
                                                            width="100" height="100"
                                                            style="border-radius: 10px; border:solid 1px black;">
                                                    @endif

                                                    @error('image')
                                                        <h4 class="form-text text-danger"> - {{ $message }}</h4>
                                                    @enderror
                                                </div>



                                                    {{--  Description --}}
                                                    <div class="col-12">
                                                        <label class="text-dark font-weight-medium mb-3" for="description">
                                                            Description: <strong class="text-danger">
                                                                * @error('description')
                                                                    - {{ $message }}
                                                                @enderror
                                                            </strong>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">

                                                            </div>
                                                            <textarea style="width: 90% !important" name="description" class="form-control ckeditor" rows="5"
                                                                id='description'>{!! isset($blog->description) ? $blog->description : null !!}</textarea>
                                                        </div>
                                                    </div>

                                                   

                                                    <div class="col-md-12 mb-3">
                                                        <button class="mdi btn btn-primary" type="submit"><span
                                                                class="mdi mdi-plus"></span>Edit</button>
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
