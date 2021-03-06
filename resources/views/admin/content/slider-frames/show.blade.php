@extends('adminlte::page')

@section('title', 'Слайдер - Кадр')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-image"></i> Кадр
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ $model->getImage() }}" alt="Profile image" class="rounded embed-responsive">
                        </div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <th style="width: 150px">Язык</th>
                                            <th>Заголовок</th>
                                            <th>Описание</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($activeLanguages as $language)
                                            <tr>
                                                <td><strong>{{ $language->language_name }}: </strong></td>
                                                <td>{{ $model->getTranslation('frame_title', $language->language_locale_id) }}</td>
                                                <td>{{ $model->getTranslation('frame_description', $language->language_locale_id) }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route($routePrefix . '.index') }}" class="btn btn-default">Назад</a>
                    <a href="{{ route($routePrefix . '.edit', $model->frame_id) }}" class="btn btn-primary">Редактировать</a>
                </div>
            </div>
        </div>
    </div>
@stop
