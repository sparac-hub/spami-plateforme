<!DOCTYPE html>
<html lang="en">
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
<body>
<div class="wrap_spa error_tpl_page">
    @include(front_dir() . '.layouts.app_partials.header_inside')
    <div class="wrap_content_pages">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <div class="page-error">
                        <div class="title-error">
                            @yield('code')
                        </div>

                        <div class="txt_bottom">
                            @yield('message')
                        </div>
                        <div class="txt_contact-error text-center ">
                            vous pouvez nous contacter aux numéros suivants:<br>
                            <a href="tel:0021671206649">+216 71 206 649</a> /
                            <a href="tel:0021671206485">+216 71 206 485</a>
                        </div>
                        <a href="{{ route('front.home') }}" class="text-center btn_submit_sparac">Retour à l'accueil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include(front_dir() . '.layouts.app_partials.footer')
</div>
@include(front_dir() . '.layouts.app_partials.footer_scripts')
</body>
</html>
