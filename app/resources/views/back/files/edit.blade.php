@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.files.edit', $file->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.files.edit'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.files.update', $file->id) }}" method="post" class="form-create"
          enctype="multipart/form-data">

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

                        <h1>{{config('translatable.active_locales.'.$locale.'.name')}}</h1>

                        <div class="form-group">
                            <label>{{__('og.file_translations.name')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[name]"
                                   value="{{old($locale.'[name]', $file->translateOrNew($locale)->name)}}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.file_translations.description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[description]"
                                      rows="3">{{ old($locale.'[description]',$file->translateOrNew($locale)->description) }}</textarea>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.files.file_category_id')}} </label>
            <select class="form-control" name="file_category_id">
                <option value=""> ---</option>

                @if($file_categories)
                    @foreach ($file_categories as $file_category)
                        <option value="{{ $file_category->id }}"
                            {{ (old('file_category_id') == $file_category->id || $file_category->id == $file->file_category_id)?'selected':'' }}>{{ $file_category->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.files.order')}} </label>
            <input type="number" class="form-control" name="order" value="{{$file->order}}">
        </div>

        <div class="form-group">
            <label>{{__('og.files.is_active')}} </label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1"
                               @if($file->is_active){{'checked'}}@endif class="icheck"> Activé </label>
                    <label>
                        <input type="radio" name="is_active" value="0"
                               @if(!$file->is_active){{'checked'}}@endif class="icheck"> Désactivé </label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                @if (!$file->getMedia()->isEmpty())
                    <label for="link">Upload Publication File: {{ $file->getMedia()->first()->file_name }}</label>
                @endif
                <input id="file" type="file" class="form-control" name="file">
            </div>
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
