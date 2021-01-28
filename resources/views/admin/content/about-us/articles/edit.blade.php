@extends('adminlte::page')

@section('title', 'О нас - Статьи - Редактировать статью')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i> Редактировать статью
                    </h3>
                </div>
                <form id="form" action="{{ route($routePrefix . '.update', $model->article_id) }}" method="post">
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        @include('admin.content.about-us.articles.form')
                    </div>

                    <div class="card-footer">
                        <a href="{{ route($routePrefix . '.index') }}" class="btn btn-default">Назад</a>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
