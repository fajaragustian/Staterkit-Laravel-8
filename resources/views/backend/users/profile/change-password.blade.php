@extends('layouts.backend.app')
@section('title','Change Password Users')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <ol class="breadcrumb">
            {{ Breadcrumbs::render('password') }}
        </ol>
    </div>
    <div class="justify-content-center">
        @if ( \Session::has('success'))
        <div class="alert alert-success" role="alert">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        @if ( \Session::has('error'))
        <div class="alert alert-danger" role="alert">
            <p>{{ \Session::get('error') }}</p>
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
                    <form action="{{route('update-password')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 d-flex justify-content-center">
                                <div class="row">
                                    <img class="img-fluid rounded-circle"
                                        src="{{ url('/images/avatar/'.Auth::user()->avatar)}}"
                                        style="width:190px ; height:180px;">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group row">
                                    <label for="current-password" class="col-sm-3 col-form-label">Current
                                        Password</label>
                                    <div class="col-sm-9">
                                        <input type="password"
                                            class="form-control @error('current-password') is-invalid @enderror"
                                            name="current-password" placeholder="Your Old Password" required>
                                        @error('current-password')
                                        <div class="invalid-feedback mt-2">
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new-password" class="col-sm-3 col-form-label">New
                                        Password</label>
                                    <div class="col-sm-9">
                                        <input type="password"
                                            class="form-control @error('new-password') is-invalid @enderror"
                                            name="new-password" placeholder="Your New Password" required>
                                        @error('new-password')
                                        <div class="invalid-feedback mt-2">
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new-password_confirmation" class="col-sm-3 col-form-label">Confirm
                                        Password</label>
                                    <div class="col-sm-9">
                                        <input type="password"
                                            class="form-control @error('new-password') is-invalid @enderror"
                                            name="new-password_confirmation" placeholder="Your Confirmation Password"
                                            required>
                                        @error('new-password_confirmation')
                                        <div class="invalid-feedback mt-2">
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

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
