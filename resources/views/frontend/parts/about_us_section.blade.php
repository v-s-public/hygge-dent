<section class="page-section" id="about-us">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">{{ __('frontend.navigation_and_sections.about_us') }}</h2>
        </div>

        <div class="row">
            <div class="col-md-7">
                {!! $articleService::getArticleTitleByShortCode('about_us_0RO7MOVZPx', 'h3', 'inner-section-heading') !!}

                {!! $articleService::getArticleTextByShortCode('about_us_0RO7MOVZPx', 'div', 'article-text') !!}
            </div>
            <div class="col-md-5">
                <div class="owl-carousel owl-theme about-us-carousel">
                    <div class="item">
                        <img src="/assets/img/about-us/slider/about1.jpg" class="radius-025 bordered-image" alt="frame-1">
                    </div>
                    <div class="item">
                        <img src="/assets/img/about-us/slider/about2.jpg" class="radius-025 bordered-image" alt="frame-2">
                    </div>
                    <div class="item">
                        <img src="/assets/img/about-us/slider/about3.jpg" class="radius-025 bordered-image" alt="frame-3">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                {!! $articleService::getArticleTextByShortCode(
                    'about_us_a40GXiz7OC',
                    'div',
                    'inner-section-replica text-center text-muted segoe-font font1_25rem'
                ) !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <img src="/assets/img/about-us/safety/dezinfection.jpeg" alt="dezinfection" class="img-fluid radius-025 bordered-image">
            </div>
            <div class="col-md-8">
                {!! $articleService::getArticleTitleByShortCode('about_us_2A4GNyBJvg', 'h3', 'inner-section-heading') !!}

                {!! $articleService::getArticleTextByShortCode('about_us_2A4GNyBJvg', 'div', 'article-text') !!}
            </div>
        </div>
    </div>

    <section class="bg-light inner-section">
        <div class="container">
            <h3 class="text-center inner-section-heading">{{ mb_strtoupper(__('frontend.navigation_and_sections.results')) }}</h3>
            <div class="row">
                @foreach($results as $result)
                    <div class="col-md-3 text-center result-box">
{{--                        <div class="result-icon"><i class="{{ $result->icon  }}"></i></div>--}}
                        <div class="segoe-font font3rem">{{ $result->count }}</div>
                        <div class="segoe-font font1_25rem">{{ mb_strtoupper($result->title) }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</section>
