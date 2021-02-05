<section class="page-section" id="for-patients">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">{{ __('frontend.navigation_and_sections.for_patients') }}</h2>
        </div>

        <div class="row">
            <div class="col-md-4">
                <img src="/assets/img/for-patients/dear-patients-1.jpg" alt="dear-patients-1" class="img-fluid radius-025 bordered-image">
                <div class="inner-section-photo-divider"></div>
                <img src="/assets/img/for-patients/dear-patients-2.jpg" alt="dear-patients-2" class="img-fluid radius-025 bordered-image">
            </div>
            <div class="col-md-8">
                {!! $articleService::getArticleTitleByShortCode('for_patients_JwrrOSJay2', 'h3', 'inner-section-heading') !!}

                {!! $articleService::getArticleTextByShortCode('for_patients_JwrrOSJay2', 'div', 'article-text') !!}

                <div class="text-center">
                    <button type="button" class="btn btn-primary btn-xl text-uppercase js-scroll-trigger m-1" data-toggle="modal" data-target="#appointmentFormModal">
                        {{__('frontend.slider.buttons.make_an_appointment')}}
                    </button>
                </div>
            </div>
        </div>

        <div class="inner-section-divider"></div>

        <div class="row">
            <div class="col-md-8">
                {!! $articleService::getArticleTitleByShortCode('for_patients_hCcnbtFQb5', 'h3', 'inner-section-heading') !!}

                {!! $articleService::getArticleTextByShortCode('for_patients_hCcnbtFQb5', 'div', 'article-text') !!}
            </div>
            <div class="col-md-4">
                <img src="/assets/img/for-patients/stop.jpeg" alt="dear-patients-2" class="img-fluid radius-025 bordered-image">
            </div>
        </div>
    </div>
    <section class="bg-light inner-section">
        <div class="container">
            <h3 class="text-center inner-section-heading">{{ mb_strtoupper(__('frontend.navigation_and_sections.how_can_we_help_you')) }}</h3>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel owl-theme patient-services-carousel">
                        @foreach($patientServices as $service)
                            <div class="item text-center segoe-font font1_25rem">
                                {{ $service->title }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! $articleService::getArticleTextByShortCode(
                    'for_patients_mRCxhMCLNA',
                    'div',
                    'inner-section-replica text-center text-muted segoe-font font1_25rem'
                ) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {!! $articleService::getArticleTextByShortCode(
                    'for_patients_eNlcMChrvx',
                    'div',
                    'text-center'
                ) !!}
            </div>
        </div>
        <div class="inner-section-photo-divider"></div>
        <div class="row">
            <div class="col-md-2 offset-md-4 text-center">
                <img src="/assets/img/for-patients/arsenal.png" alt="arsenal" class="img-fluid">
            </div>
            <div class="col-md-2 text-center">
                <img src="/assets/img/for-patients/aska.png" alt="aska" class="img-fluid">
            </div>
        </div>
    </div>
</section>
