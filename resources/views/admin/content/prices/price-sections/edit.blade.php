@extends('adminlte::page')

@section('title', 'Разделы каталога цен - Редактировать раздел')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i> Редактировать раздел
                    </h3>
                </div>
                <form id="form" action="{{ route($routePrefix . '.update', $model->price_section_id) }}" method="post">
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        @include('admin.content.prices.price-sections.form')
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
