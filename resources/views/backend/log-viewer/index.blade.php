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
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <canvas id="stats-doughnut-chart" height="300" class="mb-3"></canvas>
                    </div>

                    <div class="col-md-6 col-lg-9">
                        <div class="row">
                            @foreach($percents as $level => $item)
                            <div class="col-sm-6 col-md-12 col-lg-4 mb-3">
                                <div class="box level-{{ $level }} {{ $item['count'] === 0 ? 'empty' : '' }}">
                                    <div class="box-icon">
                                        {!! log_styler()->icon($level) !!}
                                    </div>

                                    <div class="box-content">
                                        <span class="box-text">{{ $item['name'] }}</span>
                                        <span class="box-number">
                                            {{ $item['count'] }} @lang('entries') - {!! $item['percent'] !!} %
                                        </span>
                                        <div class="progress" style="height: 3px;">
                                            <div class="progress-bar" style="width: {{ $item['percent'] }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    Showing {{($permission->currentPage()-1)*
                    $permission->perPage()+($permission->total() ? 1:0)}} to
                    {{($permission->currentPage()-1)*$permission->perPage()+count($permission)}} of
                    {{$permission->total()}} Results
                    <div class="float-right">
                        {{ $permission->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->

</div>
<!---Container Fluid-->
@endsection
