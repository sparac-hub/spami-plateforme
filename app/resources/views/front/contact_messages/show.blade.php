@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$menu->title}}@endsection

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
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

                    <div class="txt_bottom">{{ trans('misc.contact.message_sent') }}</div>
                    <a href="{{ route('front.routes.index', $menu->slug) }}" class="text-center btn_submit_sparac">Contact</a>


                </div>

            </div>

        </div>
    </section>

@endsection

