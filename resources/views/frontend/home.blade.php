<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('vendor/owl-carousel/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/owl-carousel/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/front_custom.css') }}">
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h4>Current locale: {{ app()->getLocale() }}</h4>
                </div>
                <div class="col-6">
                    <h4 style="display: inline-block">Lang switcher:</h4>
                    <ul class="lang-switcher">
                        <li>
                            <a class="nav-link" href="{{ route('locale', ['locale' => 'en']) }}">EN</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('locale', ['locale' => 'ru']) }}">RU</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('locale', ['locale' => 'ua']) }}">UA</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel owl-theme">
                        @foreach($employees as $employee)
                            <div class="item p-1">

                                    <div class="card p-3">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <img class="rounded-circle" src="{{$employee->getImage()}}" alt="User profile picture">
                                            </div>
                                        </div>
                                        <h4 class="profile-username text-center">{{$employee->fio}}</h4>
                                        <h5 class="text-center">{{$employee->position}}</h5>
                                        <p>{!! $employee->description !!}</p>
                                    </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ asset('vendor/owl-carousel/owl.carousel.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('.owl-carousel').owlCarousel({
                    loop: true,
                    margin: 10,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: true
                        },
                        600: {
                            items: 3,
                            nav: false
                        },
                        1000: {
                            items: 3,
                            nav: true,
                            loop: false,
                            margin: 20
                        }
                    }
                })
            })
        </script>
    </body>
</html>
