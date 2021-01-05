@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.file_categories.create', $menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.file_categories.create'), false) !!}

    @include('back._common.alerts.messages')

    <form action="{{ route('back.file_categories.store') }}" method="post" class="form-create">

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
                            <label>{{__('og.file_category_translations.name')}} *</label>
                            <input type="text" class="form-control" name="{{ $locale }}[name]" id="name_{{ $locale }}"
                                   value="{{ old($locale.'.name') }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.file_category_translations.slug')}}</label>
                            <input type="text" class="form-control" name="{{ $locale }}[slug]" id="slug_{{ $locale }}"
                                   value="{{ old($locale.'.slug') }}">
                        </div>


                        <div class="form-group">
                            <label>{{__('og.file_category_translations.description')}} </label>
                            <textarea class="form-control" name="{{ $locale }}[description]" rows="3">
                                {{ old($locale.'.description') }}
                            </textarea>
                        </div>


                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>


        {{-- Begin common content --}}

        <input type="hidden" name="menu_id" value="{{ request('menu_id') }}">

        <div class="form-group">
            <label>{{__('og.file_categories.order')}} </label>
            <input type="number" class="form-control" name="order" value="{{ old('order') }}">
        </div>

        <div class="form-group">
            <label>{{__('og.file_categories.is_active')}} *</label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1" @if(old('is_active') == 1) checked @endif
                        class="icheck"> Activé </label>
                    <label>
                        <input type="radio" name="is_active" value="0"
                               @if(old('is_active') == 0) checked @endif
                               checked class="icheck"> Désactivé </label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.create')}}</button>

        {{-- End  common content  --}}

    </form>


    {!! set_box_foot() !!}

@endsection

@section('js')
    @include('_common.js.str_slug')
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            @foreach(config('translatable.locales') as $locale)
            $('#name_{{ $locale }}').on("keyup", function () {
                $('#slug_{{ $locale }}').val(str_slug($(this).val()));
            });
            @endforeach



        });
    </script>
@endsection
