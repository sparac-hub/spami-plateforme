@php
    if(isset($element)) {
        $test = false;
    }else{
        $test = true;

        if(isset($menu)){
         $ogTags = og_tags($menu);
        }else{
         $ogTags = og_tags();
        }
    }
@endphp

@if(isset($ogTags) && $test)
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
@else
    @yield('og_tags_element')
@endif