<section class="page-section bg-light" id="our-team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">{{ __('frontend.navigation_and_sections.our_team') }}</h2>
        </div>

        <div class="row">
            <div class="col-md-7">
                {!! $articleService::getArticleTitleByShortCode('our_team_l4zBrlukcf', 'h3', 'inner-section-heading') !!}

                {!! $articleService::getArticleTextByShortCode('our_team_l4zBrlukcf', 'div', 'article-text') !!}
            </div>
            <div class="col-md-5">
                <img src="/assets/img/our-team/about1.jpg" class="radius-025 bordered-image img-fluid" alt="our-team">
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme employees-carousel">
                    @foreach($employees as $employee)
                        <div class="item p-1">
                            <div class="p-3 team-member">
                                <img class="mx-auto rounded-circle img-fluid" src="{{$employee->getImage()}}" alt="User profile picture">
                                <h4>{{$employee->fio}}</h4>
                                <p class="text-muted">{{mb_strtoupper($employee->position)}}</p>
                                <p>{!! $employee->description !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
