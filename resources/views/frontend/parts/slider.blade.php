<section id="slider">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($sliderFrames as $key => $frame)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" {{ $key === 0 ? 'class="active"' : '' }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($sliderFrames as $key => $frame)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <img class="d-block w-100" src="{{ $frame->getImage() }}" alt="Slide # {{ $key }}">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3 style="color: black">{{ $frame->frame_title }}</h3>
                                    <p style="color: black">{{ $frame->frame_description }}</p>
                                    <div>
                                        <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#messageFormModal">
                                            {{__('frontend.slider.buttons.contact_us')}}
                                        </button>

                                        <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#appointmentFormModal">
                                            {{__('frontend.slider.buttons.make_an_appointment')}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.parts.modals.appointment')
    @include('frontend.parts.modals.appointment_success')

    @include('frontend.parts.modals.message')
    @include('frontend.parts.modals.message_success')
</section>