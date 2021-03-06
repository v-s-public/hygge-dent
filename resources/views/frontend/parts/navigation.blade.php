<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
{{--        <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="assets/img/logo.png" alt="" /></a>--}}
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ml-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase mr-auto">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#page-top">{{ __('frontend.navigation_and_sections.home') }}</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about-us">{{ __('frontend.navigation_and_sections.about_us') }}</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#for-patients">{{ __('frontend.navigation_and_sections.for_patients') }}</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#our-team">{{ __('frontend.navigation_and_sections.our_team') }}</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#prices">{{ __('frontend.navigation_and_sections.prices') }}</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#licenses">{{ __('frontend.navigation_and_sections.licenses') }}</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contacts">{{ __('frontend.navigation_and_sections.contacts') }}</a></li>
            </ul>
            <select id="lang_switcher" data-width="fit">
                @foreach($activeLanguages as $language)
                    <option value="{{ $language->language_locale_id }}" {{ $language->language_locale_id == app()->getLocale() ? 'selected' : '' }}>
                        {{ mb_strtoupper($language->language_locale_id) }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</nav>
