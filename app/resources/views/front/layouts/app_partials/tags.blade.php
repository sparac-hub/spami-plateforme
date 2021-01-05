@php
    if(isset($element)) {
        if(!isset($isfile)){$isfile = false;}
        $ogTags = og_tags('',$element, $hasMedia, $isfile);
    }
@endphp

@if(isset($element) && isset($ogTags))
    @foreach($ogTags as $ogTagKey => $ogTagValue)
        <meta property="og:{{ $ogTagKey }}" content="{{ $ogTagValue }}"/>
    @endforeach
    @foreach(config('translatable.locales') as $locale)
        <meta property="og:locale:alternate" content="{{ $locale }}"/>
    @endforeach
    <meta name="twitter:title" content="@yield('meta_title', get_cached_parameters('website_name'))">
    <meta name="twitter:description" content="@yield('meta_description', get_cached_parameters('website_name'))">
    <meta name="twitter:image"
          content="@yield('meta_image', get_cached_parameters('website_name'))">
    <meta name="twitter:card" content="summary_large_image">
@endif