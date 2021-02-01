@extends('adminlte::page')

@section('title', 'Наша команда - Сотрудники - Профиль сотрудника')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user"></i> Профиль сотрудника
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <img src="{{ $model->getImage() }}" alt="Profile image" class="employee-profile-img img-fluid img-circle embed-responsive">
                        </div>
                        <div class="col-10">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <th style="width: 150px">Язык</th>
                                            <th>Ф.И.О.</th>
                                            <th>Должность</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($activeLanguages as $language)
                                            <tr>
                                                <td><strong>{{ $language->language_name }}: </strong></td>
                                                <td>{{ $model->getTranslation('fio', $language->language_locale_id) }}</td>
                                                <td>{{ $model->getTranslation('position', $language->language_locale_id) }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <h4>Описание:</h4>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                @foreach($activeLanguages as $language)
                                                    <td><strong>{{ $language->language_name }}: </strong></td>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach($activeLanguages as $language)
                                                    <td>{!! $model->getTranslation('description', $language->language_locale_id) !!}</td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route($routePrefix . '.index') }}" class="btn btn-default">Назад</a>
                    <a href="{{ route($routePrefix . '.edit', $model->employee_id) }}" class="btn btn-primary">Редактировать</a>
                </div>
            </div>
        </div>
    </div>
@stop
