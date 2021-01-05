@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$menu->meta_title}}@endsection

@section('meta_description'){{$menu->meta_description}}@endsection

@section('meta_keywords'){{$menu->meta_keywords}}@endsection

@section('content')



    {{-- // TODO: back.common.alerts.messages --}}
    @include('back._common.alerts.messages')


    <section class="wrap_content_pages">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="breadcrumb_spa">
                        @include('front.layouts.app_partials.breadcrumbs')
                    </div>

                </div>
            </div>
        </div>
        <div class="container container_contact">
            <div class="row">
                {{-- <div class="col-md-12">
                     <h1 class="title_h1">{{$menu->meta_title}}</h1>
                 </div>--}}
                <div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-2 float-right-menu">
                    @include('front.widgets.right.index')
                </div>
                <div class="col-xs-12 col-sm-6 col-md-5 block_form_contact">
                    <h2 class="title_col_form">Formulaire de contact</h2>
                    <form class="form_contact" id="form_contact" action="{{route('front.contact_messages.submit')}}"
                          method="post">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                        <div class="form-group">
                            <input class="form-control form-control-sparac" type="text" id="last_name" name="last_name"
                                   placeholder="Nom *" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-sparac" type="text" id="first_name"
                                   name="first_name" placeholder="Prénom *" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-sparac" type="email" id="email" name="email"
                                   placeholder="Adresse mail *" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control form-control-sparac" rows="5" id="message" name="message"
                                      placeholder="Message *" required>
                                {{ old('message') }}
                            </textarea>
                        </div>


                        <div class="form-group">
                            <label>
                                <span class="text_obligatoire">* Champ obligatoire</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <div class="g-recaptcha"
                                 data-sitekey="{{config('cms.google.recaptcha.key')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12 no-padding">
                                <button type="submit" class="btn_submit_sparac">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section>

@endsection

@section('js')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
