@if(get_cached_parameters('analytics_for_backoffice'))
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async
            src="https://www.googletagmanager.com/gtag/js?id={{ get_cached_parameters('analytics_for_backoffice') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '{{ get_cached_parameters('analytics_for_backoffice') }}');
    </script>
@endif
