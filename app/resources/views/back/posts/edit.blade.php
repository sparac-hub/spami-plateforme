@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.edit'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.posts.update', $post->id) }}" method="post" class="form-create">

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
                            <label>{{__('og.post_translations.title')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[title]"
                                   value="{{$post->translateOrNew($locale)->title}}" required>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.post_translations.slug')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[slug]"
                                   value="{{$post->translateOrNew($locale)->slug}}" required>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.post_translations.content')}} *</label>
                            <textarea class="form-control" name="{{$locale}}[content]" rows="3"
                                      required>{{$post->translateOrNew($locale)->content}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.post_translations.meta_title')}} </label>
                            <input type="text" class="form-control" name="{{$locale}}[meta_title]"
                                   value="{{$post->translateOrNew($locale)->meta_title}}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.post_translations.meta_description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[meta_description]"
                                      rows="3">{{$post->translateOrNew($locale)->meta_description}}</textarea>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.posts.is_active')}} </label>
            <input type="text" class="form-control" name="is_active" value="{{$post->is_active}}">
        </div>

        <div class="form-group">
            <label>{{__('og.posts.order')}} </label>
            <input type="number" class="form-control" name="order" value="{{$post->order}}">
        </div>

        <div class="form-group">
            <label>{{__('og.posts.post_category_id')}} </label>
            <input type="text" class="form-control" name="post_category_id" value="{{$post->post_category_id}}">
        </div>


        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection
