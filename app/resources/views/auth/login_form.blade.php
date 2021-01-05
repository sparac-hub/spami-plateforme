@extends(front_dir().'.layouts.content_templates.default')

@section('content')



    <section class="wrap_content_pages">
        <div class="container">

            <div class="breadcrumb_spa">
                <a href="{{ url('/') }}" class="breadcrumb_home" title="{{ __('og.forum_login.home') }}">
                    {{ __('og.forum_login.home') }}
                </a>
                <span class="separator">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </span>
                <span class="breadcrumb_current_page">
                {{ __('og.forum_login.connexion') }}
            </span>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
                    <form class="login-form" action="{{ route('login.forums') }}" method="post">
                        {{ csrf_field() }}
                        <h2 class="title_col_form">{{ __('og.forum_login.login_to_forum') }}</h2>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-icon">
                                <input class="form-control form-control-sparac placeholder-no-fix" type="text"
                                       autocomplete="off"
                                       placeholder="{{ __('og.forum_login.email') }}" name="email"/></div>
                            @if ($errors->has('email'))
                                <span class="help-block"> {{ $errors->first('email') }} </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="input-icon">
                                <input class="form-control form-control-sparac placeholder-no-fix" type="password"
                                       autocomplete="off"
                                       placeholder="{{ __('og.forum_login.password') }}" name="password"/></div>
                            @if ($errors->has('password'))
                                <span class="help-block"> {{ $errors->first('password') }} </span>
                            @endif
                        </div>
                        <div class="form-actions">
                            <button type="submit"
                                    class="btn btn_submit_sparac green pull-right"> {{ __('og.forum_login.btn') }}</button>
                        </div>
                    </form>
                </div>
            </div>
    </section>
@endsection
