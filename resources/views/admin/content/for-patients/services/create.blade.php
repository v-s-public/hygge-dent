@extends('adminlte::page')

@section('title', 'Пациентам - Услуги - Добавить услугу')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-plus"></i> Добавить услугу
                    </h3>
                </div>
                <form id="form" action="{{ route($routePrefix . '.store') }}" method="post">
                    <div class="card-body">
                        @csrf
                        @include('admin.content.for-patients.services.form')
                    </div>

                    <div class="card-footer">
                        <a href="{{ route($routePrefix . '.index') }}" class="btn btn-default">Назад</a>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
