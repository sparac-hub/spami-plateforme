<!DOCTYPE html>
<!--[if IE 8]>
<html lang="{{ locale() }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="{{ locale() }}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{locale()}}" dir="{{locale_direction()}}">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8"/>
    @include(front_dir() . '._common.google.tag-manager-head')
    <title>@yield('meta_title', get_cached_parameters('website_name'))</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Spa-rac"/>
    <meta name="description" content="@yield('meta_description', get_cached_parameters('website_name'))">
    <meta name="keywords" content="@yield('meta_keywords', get_cached_parameters('website_name'))">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="geo.placename" content="Tunisie,Tunis">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">

    @foreach(config('translatable.locales') as $locale)
        <link rel="alternate" hreflang="{{ $locale }}" href="{{ $localizedUrls[$locale] ?? url($locale) }}"/>
    @endforeach

    @yield('head_pagination')

    @include('front.layouts.app_partials.og_tags')

    @include(front_dir() . '.layouts.app_partials.head')

    @yield('css')
</head>

<body id="body" class="@yield('body_class', 'front')">
@include(front_dir() . '._common.google.tag-manager-body')
<div class="wrap_spa">
    @include(front_dir() . '.layouts.app_partials.header_inside')

    <section class="wrap_content_pages">
        @yield('content')
    </section>

    <!-- footer -->
    @include(front_dir() . '.layouts.app_partials.footer')
</div>

@include(front_dir() . '.layouts.app_partials.footer_scripts')
@yield('js')
@include(front_dir() . '._common.google.analytics')
</body>
</html>
