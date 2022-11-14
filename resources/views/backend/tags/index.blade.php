@extends('layouts.backend.app')
@section('title','Tags Management')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <ol class="breadcrumb">
            {{ Breadcrumbs::render('tags.index') }}
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Tags</h6>
                    @can('tags-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('tags.create') }}">Tags Create</a>
                    </span>
                    @endcan
                </div>
                <div class="table-responsive px-4">
                    <table class="table align-items-center table-bordered">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>#</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tag as $index => $data)
                            <tr class="text-center">
                                <td class="mt-2">{{$index+1 }}</td>
                                <td class="mt-2">{{$data->name}}</td>
                                <td class="mt-2">{{$data->updated_at}}</td>
                                <td>
                                    <div class="row d-flex justify-content-center">
                                        <a class="btn btn-sm btn-warning mr-2 mt-1"
                                            href="{{ route('tags.show',$data->id) }}" data-toggle="tooltip"
                                            title="Show Tag"><i class="fas fa-eye"></i></a>
                                        @can('tags-edit')
                                        <a class="btn btn-sm btn-primary mr-2 mt-1"
                                            href="{{ route('tags.edit',$data->id) }}" data-toggle="tooltip"
                                            title="Edit Tag"><i class="fas fa-edit"></i></a>
                                        @endcan
                                        @can('tags-delete')
                                        <form onsubmit="return confirm('Apakah Anda Yakin Delete ?');"
                                            action="{{route('tags.destroy', $data->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger mr-2 mt-1"
                                                data-toggle="tooltip" title="Delete Tag"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $tag->links() }}
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <!--Row-->

</div>
<!---Container Fluid-->
@endsection
