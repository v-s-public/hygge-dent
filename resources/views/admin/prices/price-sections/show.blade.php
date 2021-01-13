@extends('adminlte::page')

@section('title', 'Разделы каталога цен - Раздел каталога')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-list"></i> Раздел каталога
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th style="width: 150px">Язык</th>
                                <th>Название раздела</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach($activeLanguages as $language)
                                    <tr>
                                        <td><strong>{{ $language->language_name }}: </strong></td>
                                        <td>{{ $model->getTranslation('price_section_name', $language->language_locale_id) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>


                    <div class="row">
                        <div class="col-12">

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route($routePrefix . '.index') }}" class="btn btn-default">Назад</a>
                    <a href="{{ route($routePrefix . '.edit', $model->price_section_id) }}" class="btn btn-primary">Редактировать</a>
                </div>
            </div>
        </div>
    </div>
@stop
