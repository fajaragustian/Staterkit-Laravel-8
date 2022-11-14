@extends('layouts.backend.app')
@section('title','Show Tags Management')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <ol class="breadcrumb">
            {{ Breadcrumbs::render('tags.show',$tag) }}
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Form Show Tags</h6>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="form-group col-md-4">
                            <label for="name">Name Tags</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="name" value="{{$tag->name}}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Name Slug</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="name" value="{{$tag->slug}}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" name="meta_title"
                                class="form-control @error('meta_title') is-invalid @enderror" id="meta_title"
                                value="{{$tag->meta_title}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="meta_keywords">Meta Keywords</label>
                            <input type="text" name="meta_keywords"
                                class="form-control @error('meta_keywords') is-invalid @enderror" id="meta_keywords"
                                value="{{$tag->meta_keywords}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="meta_desc">Meta Description</label>
                            <input type="text" name="meta_desc"
                                class="form-control @error('meta_desc') is-invalid @enderror" id="meta_desc" readonly
                                value="{{$tag->meta_desc}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-12">
                            <label for="Description">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                id="description" readonly>{{$tag->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class=" d-flex justify-content-end mt-3">
                                <a type="button" href="{{route('tags.edit',$tag->id)}}"
                                    class="btn btn-primary btn-md px-5 mr-2 float-right"><i
                                        class="fas fa-pen-square"></i>&nbsp;Edit</a>
                                <a type="button" href="{{route('tags.index')}}"
                                    class="btn btn-danger btn-md px-5 float-right"><i
                                        class="fas fa-share-square"></i>&nbsp;Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->

</div>
<!---Container Fluid-->
@endsection
