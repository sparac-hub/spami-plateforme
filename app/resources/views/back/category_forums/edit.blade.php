@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.category_forums.edit') }}
@endsection


@section('css')
    <link href="{{ asset('/back/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('/back/assets/global/plugins/jquery-minicolors/jquery.minicolors.css') }}" rel="stylesheet"
          type="text/css"/>
@stop

@section('content')

    {!! set_box_head(__('breadcrumbs.back.category_forums.edit'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.category_forums.update', $category->id) }}" method="post"
          class="form-create" enctype="multipart/form-data">

        @method('PUT')
        @csrf

        <div class="form-group">
            <label>{{__('og.category_forums.name')}} *</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
        </div>

        <div class="form-group">
            <label>{{__('og.category_forums.color')}} *</label>
            <input type="text" class="form-control demo minicolors-input" name="color"
                   value="{{ old('color', $category->color) }}">
        </div>

        <div class="form-group">
            <label>{{__('og.category_forums.parent_id')}}</label>
            <select class="form-control" name="parent_id">
                <option value="">---</option>
                @if($categories)
                    @foreach ($categories as $category_list)
                        <option value="{{ $category_list->id }}"
                                @if(old('parent_id', $category->parent_id) == $category_list->id) selected @endif
                        >{{ $category_list->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.category_forums.order')}} *</label>
            <input type="number" class="form-control" name="order" value="{{ old('order', $category->order) }}">
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection

@section('js')
    <script src="{{ asset("back/assets/global/plugins/jquery-validation/js/jquery.validate.min.js") }}"
            type="text/javascript"></script>
    <script src="{{ asset("back/assets/global/plugins/jquery-validation/js/localization/messages_".locale().".js") }}"
            type="text/javascript"></script>

    @include('back._common.js.summernote-with-lfm')

    <script src="{{ asset('/back/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('/back/assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('/back/assets/pages/scripts/components-color-pickers.min.js') }}"
            type="text/javascript"></script>
    <script>

        $(document).ready(function () {
            $.minicolors = {
                defaults: {
                    animationSpeed: 50,
                    animationEasing: 'swing',
                    change: null,
                    changeDelay: 0,
                    control: 'hue',
                    defaultValue: '',
                    format: 'hex',
                    hide: null,
                    hideSpeed: 100,
                    inline: false,
                    keywords: '',
                    letterCase: 'lowercase',
                    opacity: false,
                    position: 'bottom left',
                    show: null,
                    showSpeed: 100,
                    theme: 'default',
                    swatches: []
                }
            };
        });
    </script>
@append
