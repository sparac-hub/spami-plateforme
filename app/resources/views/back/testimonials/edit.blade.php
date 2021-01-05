@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.testimonials.edit', $testimonial->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.testimonials.edit'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.testimonials.update', $testimonial->id) }}" method="post" class="form-create">

        @method('PUT')
        @csrf

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
                            <label>{{__('og.testimonial_translations.title')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[title]"
                                   value="{{ old($locale . '.title', $testimonial->translateOrNew($locale)->title) }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.testimonial_translations.description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[description]"
                                      rows="3">{{ old($locale . '.description', $testimonial->translateOrNew($locale)->description) }}</textarea>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.testimonials.testimonial_category_id')}}</label>
            <select class="form-control" name="testimonial_category_id">
                <option value="">---</option>
                @if($testimonial_categories)
                    @foreach ($testimonial_categories as $testimonial_category)
                        <option value="{{ $testimonial_category->id }}"
                                @if(old('testimonial_category_id', $testimonial->testimonial_category_id) == $testimonial_category->id) selected @endif
                        >{{ $testimonial_category->title }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.testimonials.facebook')}} </label>
            <input type="text" class="form-control" name="facebook"
                   value="{{ old('facebook',$testimonial->facebook) }}">
        </div>

        <div class="form-group">
            <label>{{__('og.testimonials.instagram')}} </label>
            <input type="text" class="form-control" name="instagram"
                   value="{{ old('instagram',$testimonial->instagram) }}">
        </div>

        <div class="form-group">
            <label>{{__('og.testimonials.twitter')}} </label>
            <input type="text" class="form-control" name="twitter" value="{{ old('twitter',$testimonial->twitter) }}">
        </div>

        <div class="form-group">
            <label>{{__('og.testimonials.linkedin')}} </label>
            <input type="text" class="form-control" name="linkedin"
                   value="{{ old('linkedin',$testimonial->linkedin) }}">
        </div>

        <div class="form-group">
            <label>{{__('og.testimonials.is_active')}} </label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1"
                               @if(old('is_active', $testimonial->is_active)){{'checked'}}@endif class="icheck"> Activé
                    </label>
                    <label>
                        <input type="radio" name="is_active" value="0"
                               @if(! old('is_active', $testimonial->is_active)){{'checked'}}@endif class="icheck">
                        Désactivé
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.testimonials.order')}} </label>
            <input type="number" class="form-control" name="order" value="{{$testimonial->order}}">
        </div>

        <div class="input-group">
           <span class="input-group-btn">
             <a id="lfm-image-btn" data-input="lfm-image-thumbnail" data-preview="holder" class="btn btn-primary">
               <i class="fa fa-picture-o"></i> {{__('og.testimonials.image')}}
             </a>
           </span>
            <input id="lfm-image-thumbnail" class="form-control" type="text" name="image"
                   value="{{ old('og.testimonials.image') }}">
        </div>
        {{-- <img id="holder" style="margin-top:15px;max-height:100px;"> --}}

        <div id="lfm-image">
            @if(old('image', $testimonial->image))
                <img src="{{ old('image', $testimonial->image) }}"
                     style="margin:15px 10px 15px 10px;max-height:100px;" alt="Image">
            @endif
        </div>

        <br>

        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection


@section('js')
    @include('back._common.js.summernote-with-lfm')

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
