@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.JqueryConfirm', true)
@section('title', 'Слайдер')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-images"></i> Слайдер
                    </h3>
                </div>
                <div class="card-body">
                    <div class="add-button-container">
                        <a href="{{ route($routePrefix.'.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Добавить кадр</a>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table" class="display table table-bordered">
                            <thead>
                            <tr>
                                <th>Заголовок</th>
                                <th class="slider-grid-image-column">Картинка</th>
                                <th class="actions-column">Действия</th>
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
    @include('admin.common.js.confirm-delete-js')
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
                    { "data": "title" },
                    { "data": "image", "orderable": false, "targets": 0 },
                    { "data": "actions", "orderable": false, "targets": 0 },
                ]
            }).on('click', '.table-action-delete', function (e) {
                e.preventDefault();
                let url = $(this).attr('href');

                // this function executes from included view 'admin.common.js.confirm-delete-js'
                confirmDelete(url);
            });
        });
    </script>
@stop
