@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$menu->meta_title}}@endsection

@section('meta_description'){{$menu->meta_description}}@endsection

@section('main_content')

    @include(front_dir() . '.faqs.filter')

    @foreach($faqs as $i => $faq_item)
        <div class="panel-group" id="accordion{{ '-'.$i }}" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading{{ '-'.$i }}">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse"
                           data-parent="#accordion{{ '-'.$i}}"
                           href="#collapse{{ '-'.$i }}" aria-expanded="false"
                           aria-controls="collapse{{ '-'.$i }}">
                            {{ $faq_item->question }}
                        </a>
                    </h4>
                </div>
                <div id="collapse{{ '-'.$i }}" class="panel-collapse collapse" role="tabpanel"
                     aria-labelledby="heading{{ '-'.$i }}">
                    <div class="panel-body">
                        {{ $faq_item->answer }}
                    </div>
                </div>
            </div>
        </div>

    @endforeach

    {{ $faqs->appends(request()->all())->links(front_dir()  .'.layouts.app_partials.pagination') }}
    {{-- pp(optional($faq_categories)->toArray()) --}}

@endsection
