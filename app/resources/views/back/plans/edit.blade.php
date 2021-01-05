@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.plans.edit', $plan->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.plans.edit'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.plans.update', $plan->id) }}" method="post" class="form-create"
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
                            <label>{{__('og.plan_translations.name')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[name]"
                                   value="{{old($locale.'[name]', $plan->translateOrNew($locale)->name)}}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.plan_translations.description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[description]"
                                      rows="3">{{ old($locale.'[description]',$plan->translateOrNew($locale)->description) }}</textarea>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.plans.plan_category_id')}} </label>
            <select class="form-control" name="plan_category_id">
                <option value=""> ---</option>

                @if($plan_categories)
                    @foreach ($plan_categories as $plan_category)
                        <option value="{{ $plan_category->id }}"
                            {{ (old('plan_category_id') == $plan_category->id || $plan_category->id == $plan->plan_category_id)?'selected':'' }}>
                            {{ $plan_category->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.plans.aspim')}} </label>
            <select class="form-control" name="aspim_id">
                <option value=""> ---</option>
                @foreach ($aspims as $aspim)
                    <option value="{{$aspim->id}}"
                        {{ (old('aspim_id') == $aspim->id || $aspim->id == $plan->aspim_id)?'selected':'' }}
                    > {{$aspim->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.plans.order')}} </label>
            <input type="number" class="form-control" name="order" value="{{$plan->order}}">
        </div>

        <div class="form-group">
            <label>{{__('og.plans.is_active')}} </label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1" @if($plan->is_active){{'checked'}}@endif
                        class="icheck"> Activé </label>
                    <label>
                        <input type="radio" name="is_active" value="0" @if(!$plan->is_active){{'checked'}}@endif
                        class="icheck"> Désactivé </label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                @if (!$plan->getMedia()->isEmpty())
                    <label for="link">Upload Publication File: {{ $plan->getMedia()->first()->file_name }}</label>
                @endif
                <input id="file" type="file" class="form-control" name="plan">
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
