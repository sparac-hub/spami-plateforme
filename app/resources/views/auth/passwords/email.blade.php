<!DOCTYPE html>
<!--[if IE 8]>
<html lang="{{ locale() }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="{{ locale() }}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ locale() }}">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>{{config('app.name')}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset("back/assets/global/plugins/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset("back/assets/global/plugins/simple-line-icons/simple-line-icons.min.css") }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset("back/assets/global/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset("back/assets/global/plugins/uniform/css/uniform.default.css") }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset("back/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css") }}"
          rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset("back/assets/global/plugins/select2/css/select2.min.css") }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset("back/assets/global/plugins/select2/css/select2-bootstrap.min.css") }}" rel="stylesheet"
          type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset("back/assets/global/css/components.min.css") }}" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="{{ asset("back/assets/global/css/plugins.min.css") }}" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset("back/assets/pages/css/login-3.min.css") }}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="{{ asset("/favicon.ico") }}"/>
</head>
<!-- END HEAD -->

<body class=" login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="#">
        <img src="{{ asset("back/assets/pages/img/logo-big.png") }}" alt=""/> </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="{{ route('password.email') }}" method="post">
        {{ csrf_field() }}
        <h3>Mot de passe oublié ?</h3>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <p> Entrez votre adresse e-mail ci dessous pour reçevoir un lien de récuperation de mot de passe. </p>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="input-icon">
                <i class="fa fa-envelope"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email"
                       name="email" value="{{ old('email') }}"/></div>
            @if ($errors->has('email'))
                <span class="help-block"> {{ $errors->first('email') }} </span>
            @endif
        </div>
        <div class="form-actions">
            <a href="{{ url('/login') }}" class="btn grey-salsa btn-outline"> Retour </a>
            <button type="submit" class="btn green pull-right"> Envoyer</button>
        </div>
    </form>
    <!-- END LOGIN FORM -->


</div>
<!-- END LOGIN -->
<!--[if lt IE 9]>
<script src="{{ asset('back/assets/global/plugins/respond.min.js') }}"></script>
<script src="{{ asset('/assets/global/plugins/excanvas.min.js') }}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset("back/assets/global/plugins/jquery.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("back/assets/global/plugins/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("back/assets/global/plugins/js.cookie.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("back/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js") }}"
        type="text/javascript"></script>
<script src="{{ asset("back/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js") }}"
        type="text/javascript"></script>
<script src="{{ asset("back/assets/global/plugins/jquery.blockui.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("back/assets/global/plugins/uniform/jquery.uniform.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("back/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js") }}"
        type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset("back/assets/global/plugins/jquery-validation/js/jquery.validate.min.js") }}"
        type="text/javascript"></script>
<script src="{{ asset("back/assets/global/plugins/jquery-validation/js/additional-methods.min.js") }}"
        type="text/javascript"></script>
<script src="{{ asset("back/assets/global/plugins/select2/js/select2.full.min.js") }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset("back/assets/global/scripts/app.min.js") }}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset("back/assets/pages/scripts/login.min.js") }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>
