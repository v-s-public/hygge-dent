<script>
    $(document).ready(function () {
        $('#lang_switcher').on('change', function () {
            let lang = $(this).val();
            let url = '{{ route('locale', ['locale' => ':lang']) }}';
            url = url.replace(':lang', lang);
            window.location.href = url;
        });
    });
</script>
