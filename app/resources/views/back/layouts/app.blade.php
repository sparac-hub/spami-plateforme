<!DOCTYPE html>
<!--[if IE 8]>
<html lang="{{locale()}}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="{{locale()}}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{locale()}}" dir="{{locale_direction()}}">
<!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
    @include('back.layouts.partials.head')
</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="{{route('front.home')}}">
                <img src="{{get_cached_parameters('main_logo')}}" width="86" alt="logo" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
    @include('back.layouts.partials.top_bar_navigation')
    <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
@include('back.layouts.partials.sidebar')
<!-- END SIDEBAR -->

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->

        {{-- BEGIN THEME PANEL --
        @include('back.layouts.partials.theme_panel')
        -- END THEME PANEL --}}

        <!-- BEGIN PAGE BAR -->
        @include('back.layouts.partials.page_bar')
        <!-- END PAGE BAR -->

            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> @yield('class-page-title')
                {{--Dashboard <small>dashboard & statistics</small> --}}
            </h3>
            <!-- END PAGE TITLE-->

            <!-- END PAGE HEADER-->

            <!-- BEGIN PAGE CONTENT-->
        @yield('content')
        <!-- END PAGE CONTENT-->

        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

    {{--
    <!-- BEGIN QUICK SIDEBAR -->
    @include('back.layouts.partials.quick_side_bar')
    <!-- END QUICK SIDEBAR -->
    --}}

</div>
<!-- END CONTAINER -->

@yield('modals')

<!-- BEGIN FOOTER -->
@include('back.layouts.partials.footer')
<!-- END FOOTER -->

@include('back.layouts.partials.footer_scripts')
{{--@include('_common.scripts.sidebar-active-element')--}}
@include('back._common.google.analytics_for_backoffice')
</body>

</html>
