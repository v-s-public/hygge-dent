<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/owl-carousel/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/owl-carousel/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/front_custom.css') }}">
    </head>
    <body class="antialiased">
        @include('frontend.parts.header')

        @include('frontend.parts.slider')

        @include('frontend.parts.employees')

        @include('frontend.parts.prices')

        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('vendor/jquery-input-mask/jquery.inputmask.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/jquery-validate/jquery.validate.min.js') }}"></script>

        @include('frontend.parts.js.employees_js')
        @include('frontend.parts.js.appointment_modal_form_handler_js')
        @include('frontend.parts.js.message_modal_form_handler_js')
    </body>
</html>
