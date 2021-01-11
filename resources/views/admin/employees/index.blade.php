@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('title', 'Сотрудники')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users"></i> Сотрудники
                    </h3>
                </div>
                <div class="card-body">
                    <div class="add-button-container">
                        <a href="{{ route($routePrefix.'.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Добавить сотрудника</a>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table" class="display table table-bordered">
                            <thead>
                            <tr>
                                <th>Ф.И.О.</th>
                                <th>Должность</th>
                                <th class="employees-grid-image">Фото</th>
                                <th class="actions">Действия</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#data-table').DataTable({
                paging: true,
                searching: true,
                stateSave: true,
                orderCellsTop: true,
                order: [[ 0, "asc" ]],
                processing: true,
                responsive: true,
                pagingType: 'numbers',
                serverSide: true,
                language: {
                    url: '/vendor/data-tables/localization/Russian.json'
                },
                ajax: '{!! route( $routePrefix.'.list') !!}',
                columns: [
                    { "data": "fio" },
                    { "data": "position" },
                    { "data": "image", "orderable": false, "targets": 0 },
                    { "data": "actions", "orderable": false, "targets": 0 },
                ]
            })
        });
    </script>
@stop
