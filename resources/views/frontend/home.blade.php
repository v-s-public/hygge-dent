<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h1>Current locale: {{ app()->getLocale() }}</h1>
                </div>
                <div class="col-6">
                    <h1>Lang switcher:</h1>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('locale', ['locale' => 'en']) }}">EN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('locale', ['locale' => 'ru']) }}">RU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('locale', ['locale' => 'ua']) }}">UA</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul>
                        @foreach($employees as $employee)
                            <li>{{$employee->fio}}</li>
                            <li>{{$employee->position}}</li>
                            <li>{!! $employee->description !!}</li>
                            <hr>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
