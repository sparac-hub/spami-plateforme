@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.partners.create', $menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.partners.create'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.partners.store') }}" method="post" class="form-create">

        @csrf
        <input type="hidden" name="menu_id" value="{{ request('menu_id', null) }}">

        <div class="tabbable-line">
            <ul class="nav nav-tabs">
                @foreach(config('translatable.locales') as $k => $locale)
                    <li class="@if($k==0) active @endif">
                        <a href="#tab_1_{{$locale}}"
                           data-toggle="tab">{{config('translatable.active_locales.'.$locale.'.name')}}
                            <span class="label label-sm @if($k==0) label-default @else label-danger @endif circle">{{ucfirst($locale)}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content">
                @foreach(config('translatable.locales') as $k => $locale)
                    <div class="tab-pane @if($k==0) active @endif" id="tab_1_{{$locale}}">

                        {{-- Begin translatable content --}}

                        <h1>{{config('translatable.active_locales.'.$locale.'.name')}}</h1>

                        <div class="form-group">
                            <label>{{__('og.partner_translations.title')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[title]"
                                   value="{{ old($locale.'.title') }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.partner_translations.description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[description]" rows="3">
                                {{ old($locale.'.description') }}
                            </textarea>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.partners.is_active')}} *</label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1"
                               @if(old('is_active') == 1) checked @endif class="icheck"> Activé
                    </label>
                    <label>
                        <input type="radio" name="is_active" value="0"
                               @if(old('is_active') == 0) checked @endif class="icheck"> Désactivé
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.partners.partner_category_id')}}</label>
            <select class="form-control" name="partner_category_id">
                <option value="">---</option>
                @if($partner_categories)
                    @foreach ($partner_categories as $partner_category)
                        <option value="{{ $partner_category->id }}"
                                @if(old('partner_category_id') == $partner_category->id) selected @endif
                        >{{ $partner_category->title }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.partners.order')}} </label>
            <input type="number" class="form-control" name="order" value="{{ old('order') }}">
        </div>

        <div class="form-group">
            <label>{{__('og.partners.protocol')}} *</label>
            <select class="form-control" name="protocol" required>
                <option></option>
                <?php $select_protocols = ['http://', 'https://'] ?>
                @foreach($select_protocols as $protocol)
                    <option value="{{ $protocol }}"
                            @if(old('protocol') === $protocol) selected @endif>{{ $protocol }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.partners.url')}} *</label>
            <input type="text" class="form-control" name="url" value="{{ old('url') }}" required>
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

        <div id="lfm-image"></div>

        <br>

        <button type="submit" class="btn btn-primary">{{__('og.button.create')}}</button>

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
