@extends('adminlte::page')

@section('title', 'Сообщения - Сообщение')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-list"></i> Сообщение
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <th>Ф.И.О.</th>
                            <th>E-mail</th>
                            <th>Тема</th>
                            <th>Сообщение</th>
                            <th>Дата/время</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $model->fio }}</td>
                                <td>{{ $model->email }}</td>
                                <td>{{ $model->theme }}</td>
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
