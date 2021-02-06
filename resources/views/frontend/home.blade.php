<!-- Inject Articles service -->
@inject('articleService', 'App\Services\Frontend\Articles')

<!DOCTYPE html>
<html lang="en">
    <head>
        @include('frontend.parts._head')
    </head>
    <body id="page-top">
        <!-- Navigation -->
        @include('frontend.parts.navigation')

        <!-- Masthead -->
        <header class="masthead">
            <div id="slider">
                @include('frontend.parts.slider')
            </div>
        </header>

        <!-- About Us -->
        @include('frontend.parts.about_us_section')

        <!-- For Patients -->
        @include('frontend.parts.for_patients_section')

        <!-- Our Team -->
        @include('frontend.parts.out_team_section')

        <!-- Prices -->
        @include('frontend.parts.prices_section')

        <!-- Licenses -->
        @include('frontend.parts.licenses_section')

        <!-- Contact-->
        @include('frontend.parts.contacts_section')

        <!-- Footer-->
        @include('frontend.parts.footer')

        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('vendor/jquery-input-mask/jquery.inputmask.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/jquery-validate/jquery.validate.min.js') }}"></script>

        @include('frontend.parts.js.appointment_modal_form_handler_js')
        @include('frontend.parts.js.message_modal_form_handler_js')
        @include('frontend.parts.js.owl_carousel_js')
        @include('frontend.parts.js.map_js')
        @include('frontend.parts.js.gallegy_licenses_js')

        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
