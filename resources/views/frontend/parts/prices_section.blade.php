<section class="page-section" id="prices">
    <div class="container">

        <div class="text-center">
            <h2 class="section-heading text-uppercase">{{ __('frontend.navigation_and_sections.prices') }}</h2>
        </div>

        <div class="row">
            <div class="col-12">
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
                                <div class="row">
                                    @include('frontend.parts.prices_section_divided_tables', ['positions' => $section->pricePositions])
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
