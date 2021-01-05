@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$menu->meta_title}}@endsection

@section('meta_description'){{$menu->meta_description}}@endsection

@section('css')
    <link href="{{ asset('/back/assets/global/plugins/jquery-nestable/jquery.nestable.css') }}" rel="stylesheet"
          type="text/css"/>
    <style>
        .dd-handle {
            height: 35px;
        }
    </style>
@stop

@section('content')

    @php
        $menuGroups= $sitemaps->getMenuGroups();
    @endphp

    @foreach($menuGroups->chunk(2) as $chunk)
        <div class="container container-sitemap">
            <div class="row">
                @foreach($chunk as $chunk_part)
                    <div class="col-sm-6 col-md-4">
                        {!! set_box_head_sitemap($chunk_part->name, false) !!}

                        <div class="dd" id="nestable_list_{{ $chunk_part->id }}">

                            <ol class="dd-list list_cms">
                                @php($menus_tree = buildTree($chunk_part->menus->where('is_active', true)->sortBy('order')->toArray()))

                                @include(front_dir() . '.sitemaps.partials.nestable_menu_children')
                            </ol>
                        </div>
                        {!! set_box_foot() !!}
                    </div>
                @endforeach
            </div>
        </div>

    @endforeach

@endsection


@section('js_after')
    <script src="{{ asset('/back/assets/global/plugins/jquery-nestable/jquery.nestable.js') }}"
            type="text/javascript"></script>
@stop


