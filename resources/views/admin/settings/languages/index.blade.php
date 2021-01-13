@extends('adminlte::page')

@section('title', 'Настройки - Настройки языков')

@section('plugins.Switcher', true)

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="callout callout-danger">
                <h5>ВНИМАНИЕ!</h5>

                <p>Отключение языка приведёт к тому, что:
                    <ul>
                    <li>контент на этом языке перестанет отображаться в публичной части сайта;</li>
                    <li>изчезнет переключатель для этого языка в публичной части сайта;</li>
                    <li>изчезнут поля для заполнения для этого языка в административной части сайта.</li>
                    </ul>
                </p>
            </div>

            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-fw fa-globe-africa"></i> Настройки языков
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Язык</th>
                            <th>Локаль</th>
                            <th>Флаг</th>
                            <th style="width: 200px">Статус</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($languages as $index => $language)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $language->language_name }}</td>
                                <td>{{ $language->language_locale_id }}</td>
                                <td><img src="{{ $language->getFlag() }}" class="border" alt="flag"></td>
                                <td>
                                    <input
                                        type="checkbox"
                                        name="switcher_{{ $language->language_locale_id }}"
                                        id="switcher_{{ $language->language_locale_id }}"
                                        checked
                                        data-bootstrap-switch
                                        data-off-color="danger"
                                        data-on-color="primary"
                                        data-on-text="ВКЛ"
                                        data-off-text="ОТКЛ"
                                        data-language-id="{{ $language->language_id }}"
                                    >
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    @include('admin.settings.languages.lang-status-toggle-js')
@stop
