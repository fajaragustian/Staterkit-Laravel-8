@extends('layouts.backend.app')
@section('title','Edit Tags Management')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <ol class="breadcrumb">
            {{ Breadcrumbs::render('tags.edit', $tag) }}
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Form Tags</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('tags.update', $tag->id) }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="form-group row">
                            <div class="form-group col-md-4">
                                <label for="name">Name Tags</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    id="name" placeholder="Your Name Tags" required
                                    value="{{ $tag->name ?: old('name')}}">
                                <small id="slug" class="form-text text-muted mt-1">&nbsp;Example:What Your Name.</small>
                                @error('name')
                                <div class="invalid-feedback mt-2">
                                    <div class="alert alert-danger">{{ $message }}</div>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="slug">Name Slug</label>
                                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                                    id="slug" placeholder="Your Name Slug Tags" value="{{ $tag->slug ?: old('slug')}}"
                                    readonly>
                                <small id="slug" class="form-text text-muted mt-1 ">&nbsp;Generate Slug with Field
                                    Name.</small>
                                @error('slug')
                                <div class="invalid-feedback mt-2">
                                    <div class="alert alert-danger">{{ $message }}</div>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title"
                                    class="form-control @error('meta_title') is-invalid @enderror" id="meta_title"
                                    placeholder="Your Name Meta Title" required
                                    value="{{ $tag->meta_title ?: old('meta_title')}}"">
                                @error('meta_title')
                                <div class=" invalid-feedback mt-2">
                                <div class="alert alert-danger">{{ $message }}</div>
                            </div>
                            @enderror
                        </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" name="meta_keywords"
                            class="form-control @error('meta_keywords') is-invalid @enderror" id="meta_keywords"
                            placeholder="Your Name Meta Keywords" required
                            value="{{ $tag->meta_keywords ?: old('meta_keywords')}}">
                        @error('meta_keywords')
                        <div class=" invalid-feedback mt-2">
                            <div class="alert alert-danger">{{ $message }}</div>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="meta_desc">Meta Description</label>
                        <input type="text" name="meta_desc"
                            class="form-control @error('meta_desc') is-invalid @enderror" id="meta_desc"
                            placeholder="Your Name Meta Description" required
                            value="{{ $tag->meta_desc ?: old('meta_desc')}}">
                        @error('meta_desc')
                        <div class="invalid-feedback mt-2">
                            <div class="alert alert-danger">{{ $message }}</div>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-md-12">
                        <label for="Description">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                            id="description"
                            placeholder="Your Description Tags">{{ $tag->description ?: old('description')}}</textarea>
                        @error('description')
                        <div class="invalid-feedback mt-2">
                            <div class="alert alert-danger">{{ $message }}</div>
                        </div>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <div class="col-sm-12">
                        <div class=" d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-primary btn-md px-5 mr-2 float-right"><i
                                    class="fas fa-plus-circle"></i>&nbsp;Submit</button>
                            <a type="button" href="{{route('tags.index')}}"
                                class="btn btn-danger btn-md px-5 float-right"><i
                                    class="fas fa-share-square"></i>&nbsp;Cancel</a>
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
