@extends('layouts.backend.app')
@section('title','Add Users Management')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <ol class="breadcrumb">
            {{ Breadcrumbs::render('users.create') }}
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
                    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Full Name</label>
                        <div class="col-sm-9">
                            {!! Form::text('name', null, array('placeholder' => 'Your Full Name','class' =>
                            'form-control' .
                            ($errors->has('name') ? ' is-invalid' : null ))) !!}
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
                            {!! Form::email('email', null, array('placeholder' => 'Your Email Address','class' =>
                            'form-control' .
                            ($errors->has('email') ? ' is-invalid' : null ))) !!}
                            @error('email')
                            <div class="invalid-feedback mt-2">
                                <div class="alert alert-danger">{{ $message }}</div>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            {!! Form::password('password', array('placeholder' => 'Your Password','class' =>
                            'form-control' .
                            ($errors->has('password') ? ' is-invalid' : null ) ,'maxlength' => 10 )) !!}
                            @error('password')
                            <div class="invalid-feedback mt-2">
                                <div class="alert alert-danger">{{ $message }}</div>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="confirm-password" class="col-sm-3 col-form-label">Password Confirmation</label>
                        <div class="col-sm-9">
                            {!! Form::password('confirm-password', array('placeholder' => 'Confirmation','class' =>
                            'form-control' .
                            ($errors->has('confirm-password') ? ' is-invalid' : null ))) !!}
                            @error('confirm-password')
                            <div class="invalid-feedback mt-2">
                                <div class="alert alert-danger">{{ $message }}</div>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="roles" class="col-sm-3 col-form-label">Roles</label>
                        <div class="col-sm-9">
                            {!! Form::select('roles[]', $roles,[], array('class' =>
                            'form-control' . ($errors->has('roles') ? ' is-invalid' : null ) ,'multiple'
                            )) !!}
                            @error('roles')
                            <div class="invalid-feedback mt-2">
                                <div class="alert alert-danger">{{ $message }}</div>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class=" d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-primary btn-md px-5 float-right">Submit</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!--Row-->

</div>
<!---Container Fluid-->
@endsection
