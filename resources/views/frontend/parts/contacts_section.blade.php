<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">{{ __('frontend.navigation_and_sections.contacts') }}</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="row">
                        <div class="col-md-2 contact-icon-container">
                            <i class="fas fa-3x fa-map-marker-alt"></i>
                        </div>
                        <div class="col-md-10 contact-content-container">
                            {{ __('frontend.contacts.address') }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 contact-icon-container">
                            <i class="fas fa-3x fa-envelope"></i>
                        </div>
                        <div class="col-md-10 contact-content-container">
                            hygge.dent.zp@ukr.net
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 contact-icon-container">
                            <i class="fas fa-3x fa-mobile-alt"></i>
                        </div>
                        <div class="col-md-10 contact-content-container">
                            (061)707-64-62, (067)224-64-65
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 contact-icon-container">
                            <i class="fas fa-3x fa-clock"></i>
                        </div>
                        <div class="col-md-10 contact-content-container">
                            {{ __('frontend.contacts.scheduler.mon_fri') }} <br>
                            {{ __('frontend.contacts.scheduler.saturday') }} <br>
                            {{ __('frontend.contacts.scheduler.sunday') }}
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="button" class="btn btn-primary btn-xl text-uppercase js-scroll-trigger contact-section-button" data-toggle="modal" data-target="#messageFormModal">
                        {{__('frontend.slider.buttons.contact_us')}}
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <div id="map" class="radius-025"></div>
            </div>
        </div>
    </div>
</section>
