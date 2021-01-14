<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('vendor/owl-carousel/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/owl-carousel/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/front_custom.css') }}">
    </head>
    <body class="antialiased">
        <section id="header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ul class="lang-switcher float-right">
                            @foreach($activeLanguages as $language)
                                <li>
                                    <a class="nav-link" href="{{ route('locale', ['locale' => $language->language_locale_id]) }}">{{ strtoupper($language->language_locale_id) }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section id="employees">
            <div class="container">
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
        </section>
        <section id="prices">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    @foreach($priceSections as $key => $section)
                                        @if(count($section->pricePositions))
                                            <li class="nav-item">
                                                <a class="nav-link {{ $key === 0 ? 'active' : '' }}" id="tab_{{ $key }}" data-toggle="tab" href="#tab-{{ $key }}" role="tab" aria-controls="tab-{{ $key }}" aria-selected="{{ $key === 0 ? 'true' : 'false' }}">
                                                    {{ $section->price_section_name }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    @foreach($priceSections as $key => $section)
                                        @if(count($section->pricePositions))
                                            <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}" id="tab-{{ $key }}" role="tabpanel" aria-labelledby="tab-{{ $key }}-tab">
                                                <table class="table">
                                                    <tbody>
                                                    @foreach($section->pricePositions as $position)
                                                        <tr>
                                                            <td>{{ $position->price_position_name }}</td>
                                                            <td style="width: 120px">{{ $position->price }} грн.</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <br>
        <br>
        <br>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
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
