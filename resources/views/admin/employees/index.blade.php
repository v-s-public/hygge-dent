@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('title', 'Сотрудники')

@section('content')
    <div class="card card-default color-palette-box">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-users"></i>
                Сотрудники
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="data-table" class="display table table-bordered">
                            <thead>
                            <tr>
                                <th>Ф.И.О.</th>
                                <th>Должность</th>
                                <th>Описание</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
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
                ajax: '{!! route( $routePrefix.'.list') !!}',
                columns: [
                    { "data": "fio" },
                    { "data": "position" },
                    { "data": "description" },
                    { "data": "actions", "orderable": false, "targets": 0 },
                ]
            })
        });
    </script>
@stop
