@extends('layouts.backend.app')
@section('title','Categories Management')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <ol class="breadcrumb">
            {{ Breadcrumbs::render('roles.index') }}
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
            <!-- Data Roles -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Categories</h6>
                    @can('categories-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('categories.create') }}">Categories Create</a>
                    </span>
                    @endcan
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Keywords</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $index => $data)
                            <tr class="text-center">
                                {{-- <td><a href="#">RA0449</a></td> --}}
                                <td>{{$index+1 }}</td>
                                <td>{{$data->name}}</td>
                                <td><a href="{{ route('roles.show',$role->id) }}"
                                        class="btn btn-md btn-warning">Show</a>
                                    @can('categories-edit')
                                    <a class="btn btn-primary" href="{{ route('categories.edit',$data->id) }}">Edit</a>
                                    @endcan
                                    @can('categories-delete')
                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy',
                                    $role->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $category->render() }}
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <!--Row-->

</div>
<!---Container Fluid-->
@endsection
