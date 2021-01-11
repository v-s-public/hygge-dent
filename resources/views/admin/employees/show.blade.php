@extends('adminlte::page')

@section('title', 'Сотрудники - Профиль сотрудника')

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
                                <div class="col-6">
                                    <h4>Ф.И.О.:</h4>
                                    <p><strong>Укр: </strong>{{ $model->getTranslation('fio', 'ua') }}</p>
                                    <p><strong>Англ: </strong>{{ $model->getTranslation('fio', 'en') }}</p>
                                    <p><strong>Рус: </strong>{{ $model->getTranslation('fio', 'ru') }}</p>
                                </div>
                                <div class="col-6">
                                    <h4>Должность:</h4>
                                    <p><strong>Укр: </strong>{{ $model->getTranslation('position', 'ua') }}</p>
                                    <p><strong>Англ: </strong>{{ $model->getTranslation('position', 'en') }}</p>
                                    <p><strong>Рус: </strong>{{ $model->getTranslation('position', 'ru') }}</p>
                                </div>
                            </div>
                            <hr>
                            <h4>Описание:</h4>
                            <div class="row">
                                <div class="col-4"><strong>Укр:</strong></div>
                                <div class="col-4"><strong>Англ:</strong></div>
                                <div class="col-4"><strong>Рус:</strong></div>
                            </div>
                            <div class="row">
                                <div class="col-4">{{ $model->getTranslation('description', 'ua') }}</div>
                                <div class="col-4">{{ $model->getTranslation('description', 'en') }}</div>
                                <div class="col-4">{{ $model->getTranslation('description', 'ru') }}</div>
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
