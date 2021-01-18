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
