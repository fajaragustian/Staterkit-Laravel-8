@extends('layouts.backend.app')
@section('title','Roles Show Management')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <ol class="breadcrumb">
            {{ Breadcrumbs::render('roles.show', $role) }}
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Form Roles</h6>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" placeholder="Name Address"
                                value="{{$role->name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="roles" class="col-sm-3 col-form-label">Roles</label>
                        <div class="col-sm-9">
                            <h5 class="fs-5">
                                @if(!empty($rolePermissions))
                                @foreach($rolePermissions as $permission)
                                <span class="badge badge-primary">
                                    {{ $permission->name }}
                                </span>
                                @endforeach
                                @endif
                            </h5>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class=" d-flex justify-content-end mt-3">
                                <a type="button" href="{{ route('roles.index') }}"
                                    class="btn btn-primary btn-md mr-3 px-5 ">Back</a>
                                <a type="button" href="{{ route('roles.edit',$role->id) }}"
                                    class="btn btn-success btn-md px-5 ">Edit</a>
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
