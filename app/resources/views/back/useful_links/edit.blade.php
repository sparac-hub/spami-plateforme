@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.useful_links.edit', $useful_link->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('og.box_title.edit'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.useful_links.update', $useful_link->id) }}" method="post" class="form-create">

        @method('PUT')
        @csrf

        <div class="tabbable-line">
            <ul class="nav nav-tabs">
                @foreach(config('translatable.locales') as $k => $locale)
                    <li class="@if($k==0) active @endif">
                        <a href="#tab_1_{{$locale}}"
                           data-toggle="tab">{{config('translatable.active_locales.'.$locale.'.name')}}
                            <span
                                class="label label-sm @if($k==0) label-default @else label-danger @endif circle">{{ucfirst($locale)}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content">
                @foreach(config('translatable.locales') as $k => $locale)
                    <div class="tab-pane @if($k==0) active @endif" id="tab_1_{{$locale}}">

                        {{-- Begin translatable content --}}

                        <h1>{{config('translatable.active_locales.' . $locale . '.name')}}</h1>

                        <div class="form-group">
                            <label>{{__('og.useful_link_translations.title')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[title]"
                                   value="{{ old($locale . '.title', $useful_link->translateOrNew($locale)->title) }}"
                            >
                        </div>

                        <div class="form-group">
                            <label>{{__('og.useful_link_translations.description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[description]"
                                      rows="3">{{old($locale . '.description', $useful_link->translateOrNew($locale)->description) }}</textarea>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.useful_links.is_active')}} </label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1"
                               @if(old('is_active', $useful_link->is_active)){{'checked'}}@endif class="icheck"> Activé
                    </label>
                    <label>
                        <input type="radio" name="is_active" value="0"
                               @if(! old('is_active', $useful_link->is_active)){{'checked'}}@endif class="icheck">
                        Désactivé
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.useful_links.order')}} </label>
            <input type="number" class="form-control" name="order" value="{{ old('order', $useful_link->order) }}">
        </div>

        <div class="form-group">
            <label>{{__('og.useful_links.useful_link_category_id')}} </label>
            <select class="form-control" name="useful_link_category_id">
                <option value=""> ---</option>

                @if($useful_link_categories)
                    @foreach ($useful_link_categories as $useful_link_category)
                        <option value="{{ $useful_link_category->id }}"
                            {{ (old('useful_link_category_id') == $useful_link_category->id || $useful_link_category->id == $useful_link->useful_link_category_id)?'selected':'' }}>
                            {{ $useful_link_category->title }}</option>
                    @endforeach
                @endif
            </select>
        </div>


        <div class="form-group">
            <label>{{__('og.useful_links.protocol')}} *</label>
            <select class="form-control" name="protocol" required>
                <option value=""></option>
                @foreach(config('cms.http_protocols') as $protocol)
                    <option value="{{ $protocol }}"
                    @if($protocol == old('protocol', $useful_link->protocol)){{'selected'}}@endif>{{ $protocol }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.useful_links.url')}} *</label>
            <input type="text" class="form-control" name="url" value="{{ old('url', $useful_link->url) }}" required>
        </div>


        <div class="input-group">
           <span class="input-group-btn">
             <a id="lfm-image-btn" data-input="lfm-image-thumbnail" data-preview="holder" class="btn btn-primary">
               <i class="fa fa-picture-o"></i> {{__('og.partners.image')}}
             </a>
           </span>
            <input id="lfm-image-thumbnail" class="form-control" type="text" name="image"
                   value="{{ old('og.partners.image') }}">
        </div>
        <div id="lfm-image">
            @if(old('image', $useful_link->image))
                <img src="{{ old('image', $useful_link->image) }}"
                     style="margin:15px 10px 15px 10px;max-height:100px;" alt="Image">
            @endif
        </div>

        <br>

        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection


@section('js')
    <script src="{{ asset('/vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script>
        $(document).ready(function () {
                {{-- TODO: make this cleaner --}}
            var domain = "{{ url(config('lfm.url_prefix')) }}";

            $('#lfm-image-btn').filemanager('image', {prefix: domain});
            $('#lfm-image-thumbnail').on('change', function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#lfm-image').html('<img src="' + $(this).val() + '" style="margin:15px 10px 15px 10px;max-height:100px;">');

            });
        });
    </script>
@stop
