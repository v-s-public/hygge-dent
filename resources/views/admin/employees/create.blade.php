@extends('adminlte::page')

@section('title', 'Сотрудники - Добавить сотрудника')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-plus"></i> Добавить сотрудника
                    </h3>
                </div>
                <form id="form" action="{{ route($routePrefix . '.store') }}" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @include('admin.employees.form')
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
