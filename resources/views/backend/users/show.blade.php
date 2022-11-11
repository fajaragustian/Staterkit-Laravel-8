@extends('layouts.backend.app')
@section('title','Users Show Management')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <ol class="breadcrumb">
            {{ Breadcrumbs::render('users.show', $user) }}
        </ol>
    </div>
    <div class="justify-content-center">
        @if ( \Session::has('success'))
        <div class="alert alert-success">
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
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" placeholder="Name Address"
                                value="{{$user->name}}" readonly>
                        </div>
                        {{-- @error('title')
                        <div class="invalid-feedback">
                            <div class="alert alert-danger">{{ $message }}</div>
                        </div>
                        @enderror --}}
                    </div>
                    <div class="form-group row">
                        <label for="Email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="Email" placeholder="Email Address"
                                value="{{$user->email}}" readonly>
                        </div>
                        {{-- @error('title')
                        <div class="invalid-feedback">
                            <div class="alert alert-danger">{{ $message }}</div>
                        </div>
                        @enderror --}}
                    </div>
                    <div class="form-group row">
                        <label for="roles" class="col-sm-3 col-form-label">Roles</label>
                        <div class="col-sm-9">
                            <h5 class="fs-5"> <span class="badge badge-primary">@if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $val)
                                    {{ $val }}
                                    @endforeach
                                    @endif
                                </span>
                            </h5>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class=" d-flex justify-content-end mt-3">
                                <a type="button" href="{{ route('users.index') }}"
                                    class="btn btn-primary btn-md mr-3 px-5 ">Back</a>
                                <a type="button" href="{{ route('users.edit',$user->id) }}"
                                    class="btn btn-success btn-md px-5 ">Edit</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--Row-->

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!---Container Fluid-->
@endsection
