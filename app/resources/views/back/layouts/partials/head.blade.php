<?php $rtl_file = (locale_direction() == 'rtl') ? '-rtl' : '' ?>
<meta charset="utf-8"/>
<title>{{get_cached_parameters('website_name')}}</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('back/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"
      type="text/css"/>
<link href="{{ asset('back/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet"
      type="text/css"/>
<link href="{{ asset('back/assets/global/plugins/bootstrap/css/bootstrap'.$rtl_file.'.min.css')}}" rel="stylesheet"
      type="text/css"/>
{{-- <link href="{{ asset('back/assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css"/> --}}
<link href="{{ asset('back/assets/global/plugins/bootstrap-switch/css/bootstrap-switch'.$rtl_file.'.min.css')}}"
      rel="stylesheet"
      type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
@yield('css')
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="{{ asset('back/assets/global/css/components'.$rtl_file.'.min.css')}}" rel="stylesheet" id="style_components"
      type="text/css"/>
<link href="{{ asset('back/assets/global/css/plugins'.$rtl_file.'.min.css')}}" rel="stylesheet" type="text/css"/>
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="{{ asset('back/assets/layouts/layout/css/layout'.$rtl_file.'.min.css')}}" rel="stylesheet" type="text/css"/>
<link
    href="{{ asset('back/assets/layouts/layout/css/themes/'.get_cached_parameters('backend_theme').$rtl_file.'.min.css')}}"
    rel="stylesheet"
    type="text/css"
    id="style_color"/>
<link href="{{ asset('back/assets/layouts/layout/css/custom'.$rtl_file.'.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('back/assets/global/plugins/bootstrap-summernote/summernote.css')}}" rel="stylesheet"
      type="text/css"/>

<!-- END THEME LAYOUT STYLES -->
<link rel="shortcut icon" href=""/>
{{-- <link href="{{ asset('back/assets/layouts/layout/css/themes/light.min.css')}}" rel="stylesheet" />--}}

