@extends('adminlte::page')

@section('title', 'Записи на приём - Запись')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-list"></i> Запись на приём
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <th>Ф.И.О.</th>
                            <th>Номер телефона</th>
                            <th>Сообщение</th>
                            <th>Дата/время</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $model->fio }}</td>
                                <td>{{ $model->phone }}</td>
                                <td>{{ $model->message }}</td>
                                <td>{{ $model->getNotificationDate() }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route($routePrefix . '.index') }}" class="btn btn-default">Назад</a>
                </div>
            </div>
        </div>
    </div>
@stop
