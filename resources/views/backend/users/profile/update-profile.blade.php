@extends('layouts.backend.app')
@section('title','Edit Profile Users')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <ol class="breadcrumb">
            {{ Breadcrumbs::render('profile') }}
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Form Users</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('update-profile')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{Auth::user()->name}}">
                                @error('name')
                                <div class="invalid-feedback mt-2">
                                    <div class="alert alert-danger">{{ $message }}</div>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email Address</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{Auth::user()->email}}">
                                @error('email')
                                <div class="invalid-feedback mt-2">
                                    <div class="alert alert-danger">{{ $message }}</div>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="avatar" class="col-sm-3 col-form-label">Avatar</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                                    name="avatar">
                                <img class="img-fluid rounded-circle mt-3 ml-2"
                                    src="{{ url('/images/avatar/'.Auth::user()->avatar)}}"
                                    style="width:215px ; height:200px;">
                                @error('avatar')
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
