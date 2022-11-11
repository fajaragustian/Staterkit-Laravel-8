@extends('layouts.backend.app')
@section('title','Permissions Management')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <ol class="breadcrumb">
            {{ Breadcrumbs::render('permissions.index') }}
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Permission</h6>
                    @can('permission-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('permissions.create') }}">Permission Create</a>
                    </span>
                    @endcan
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permission as $index => $data)
                            <tr class="text-center">
                                {{-- <td><a href="#">RA0449</a></td> --}}
                                <td>{{$index+1 }}</td>
                                <td>{{$data->name}}</td>
                                <td><a href="{{ route('permissions.show',$data->id) }}"
                                        class="btn btn-md btn-warning">Show</a>
                                    @can('permission-edit')
                                    <a class="btn btn-primary" href="{{ route('permissions.edit',$data->id) }}">Edit</a>
                                    @endcan
                                    @can('permission-delete')
                                    {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy',
                                    $data->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    Showing {{($permission->currentPage()-1)*
                    $permission->perPage()+($permission->total() ? 1:0)}} to
                    {{($permission->currentPage()-1)*$permission->perPage()+count($permission)}} of
                    {{$permission->total()}} Results
                    <div class="float-right">
                        {{ $permission->appends($_GET)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->

</div>
<!---Container Fluid-->
@endsection
