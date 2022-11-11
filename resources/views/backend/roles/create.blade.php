@extends('layouts.backend.app')
@section('title','Add Roles Management')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <ol class="breadcrumb">
            {{ Breadcrumbs::render('roles.create') }}
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Form Roles</h6>
                </div>
                <div class="card-body">
                    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Name Roles</label>
                        <div class="col-sm-9">
                            {!! Form::text('name', null, array('placeholder' => 'Your Roles Name','class' =>
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
                        <label for="permission" class="col-sm-3 col-form-label">Pemission</label>
                        <div class="col-sm-9">
                            @foreach($permission as $value)
                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name'.
                                ($errors->has('permission') ? ' is-invalid' : null ))) }}
                                {{ $value->name }}</label>
                            @endforeach
                            @error('permission')
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
