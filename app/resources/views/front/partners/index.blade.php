@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$menu->meta_title}}@endsection

@section('meta_description'){{$menu->meta_description}}@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 liste_plans page-cms">

                <h1>{{$menu->label}}</h1>

                @if(!($partners->isEmpty()))

                    @include(front_dir() . '.partners.partials.filter_index')

                    <div class="results">
                        <div class="row">
                            @foreach($partners as $partner)
                                <div class="col-md-4">
                                    <label class="plan-box" for="plan-box-{{$partner->id}}" tabindex="0">
                                        <div class="content-plan-box">
                                            @if ($partner->image)
                                                <img class="img-actuality" src="{{ $partner->image }}"
                                                     alt="{{$partner->title}}" height="100" width="200"
                                                     style="margin-bottom: 10px"/>
                                            @endif
                                            <span class="projets-plan-box">{{$partner->category->title}}</span>
                                            <span>
                                                <a class="prevision-plan-box"
                                                   href="javascript:">{{$partner->title}}</a>
                                            </span>
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {!! $partners->appends(['keywords'=>request('keywords'),'category'=>request('category')])->links(front_dir() . '.layouts.app_partials.pagination') !!}

                @else
                    @if(request('keywords') || request('category'))
                        @include(front_dir() . '.partners.partials.filter_index')
                    @endif
                    <div class="alert alert-info">{{ __('og.data.no_data') }}</div>
                @endif

            </div>

            {{-- @include(front_dir() . '.widgets.index') --}}

        </div>
    </div>

@endsection

@section('head_pagination')
    {!! $partners->appends(['keywords'=>request('keywords'),'category'=>request('category')])->links(front_dir() . '.layouts.app_partials.head_pagination') !!}
@endsection
