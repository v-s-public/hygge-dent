@extends('adminlte::page')

@section('title', 'Слайдер - Добавить кадр')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-plus"></i> Добавить кадр
                    </h3>
                </div>
                <form id="form" action="{{ route($routePrefix . '.store') }}" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @include('admin.content.slider.slider-frames.form')
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
