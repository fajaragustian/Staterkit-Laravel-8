@extends('layouts.backend.app')
@section('title','Add Categories Management')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <ol class="breadcrumb">
            {{ Breadcrumbs::render('categories.create') }}
        </ol>
    </div>
    <div class="justify-content-center">
        @if ( \Session::has('success'))
        <div class="alert alert-success" role="alert">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Data Users -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Form Categories</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name Categories</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    id="name" placeholder="Enter Your Name Categories" required>
                                @error('name')
                                <div class="invalid-feedback mt-2">
                                    <div class="alert alert-danger">{{ $message }}</div>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keywords" class="col-sm-3 col-form-label">Keywords Categories</label>
                            <div class="col-sm-9">
                                <select class="select2-multiple form-control" name="tags[]" multiple="multiple"
                                    id="select2Multiple">
                                    <option value="tag1">tag1</option>
                                    <option value="tag2">tag2</option>
                                    <option value="tag3">tag3</option>
                                </select>
                                @error('keywords')
                                <div class="invalid-feedback mt-2">
                                    <div class="alert alert-danger">{{ $message }}</div>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="meta_desc" class="col-sm-3 col-form-label">Meta Desc Categories</label>
                            <div class="col-sm-9">
                                <input type="text" name="meta_desc"
                                    class="form-control @error('meta_desc') is-invalid @enderror" id="meta_desc"
                                    placeholder="Enter Your Meta Desc Categories" required>
                                @error('meta_desc')
                                <div class="invalid-feedback mt-2">
                                    <div class="alert alert-danger">{{ $message }}</div>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class=" d-flex justify-content-end mt-3">
                                    <button type="submit"
                                        class="btn btn-primary btn-md px-5 float-right">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->

</div>
<!---Container Fluid-->
@endsection
