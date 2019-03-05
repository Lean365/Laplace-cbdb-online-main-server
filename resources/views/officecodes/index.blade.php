@extends('layouts.dashboard')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">机构单位编码表</div>
        <div class="panel-body">
            <a href="{{ route('officecodes.create') }}" class="pull-right btn btn-default">新增</a>
            <div class="panel-body">
                <office-code-list></office-code-list>
            </div>
        </div>
    </div>

@endsection
@section('js')

@endsection