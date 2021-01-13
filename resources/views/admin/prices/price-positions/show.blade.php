@extends('adminlte::page')

@section('title', 'Разделы каталога цен - Раздел каталога')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-list"></i> Позиция каталога
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p><strong>Укр: </strong>{{ $model->getTranslation('price_position_name', 'ua') }}</p>
                            <p><strong>Англ: </strong>{{ $model->getTranslation('price_position_name', 'en') }}</p>
                            <p><strong>Рус: </strong>{{ $model->getTranslation('price_position_name', 'ru') }}</p>
                        </div>
                        <div class="col-6">
                            <p><strong>Раздел каталога: </strong>{{ $model->priceSection->price_section_name }}</p>
                            <p><strong>Цена: </strong>{{ $model->price }} грн.</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route($routePrefix . '.index') }}" class="btn btn-default">Назад</a>
                    <a href="{{ route($routePrefix . '.edit', $model->price_position_id) }}" class="btn btn-primary">Редактировать</a>
                </div>
            </div>
        </div>
    </div>
@stop
