@extends('adminlte::page')

@section('title', 'Позиции каталога цен - Добавить позицию')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-plus"></i> Добавить позицию
                    </h3>
                </div>
                <form id="form" action="{{ route($routePrefix . '.store') }}" method="post">
                    <div class="card-body">
                        @csrf
                        @include('admin.content.prices.price-positions.form')
                    </div>

                    <div class="card-footer">
                        <a href="{{ route($routePrefix . '.index') }}" class="btn btn-default">Назад</a>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                        <input type="submit" class="btn btn-primary" name="add_new" value="Сохранить и создать новую запись">
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
