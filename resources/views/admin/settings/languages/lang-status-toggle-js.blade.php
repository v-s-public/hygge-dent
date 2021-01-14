<script>
    @foreach($languages as $index => $language)
    $('#switcher_{{ $language->language_locale_id }}').bootstrapSwitch('state', {{ $language->language_status }})
    $('#switcher_{{ $language->language_locale_id }}').bootstrapSwitch('readonly', {{ $language->default_language }})
    $('#switcher_{{ $language->language_locale_id }}').on('switchChange.bootstrapSwitch', function (event, state) {
        let language_id = $(this).data('language-id');
        $.ajax({
            url: '{{ $toggleLanguageUrl }}',
            type: 'POST',
            dataType: 'json',
            data: {_token: "{{ csrf_token() }}", language_id: language_id},
        });
    });
    @endforeach
</script>
