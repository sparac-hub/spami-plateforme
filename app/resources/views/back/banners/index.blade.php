@extends('back.layouts.app')

@section('css')
    @include('_common.css.datatables')
    <link href="{{ asset('/back/assets/global/plugins/jquery-nestable/jquery.nestable.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('/back/assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <style>
        .dd-handle {
            height: 35px;
        }
    </style>
@stop

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.banners.index') }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.banners.index'), false) !!}

    @include('back._common.alerts.messages')

    @can('back.banners.create')
        <a href="{{ route('back.banners.create') }}" class="btn btn-primary">
            {{ __('og.button.create') }}
        </a>
    @endcan

    <hr>
    <div class="row">
        @foreach($banners as $banner)
            <div class="col-sm-12 col-md-3">
                <div class="thumbnail">
                    @if($banner->image_filepath)
                        <img src="{{ $banner->image_filepath }}" alt=""
                             style="width: 100%; height: 200px;">
                    @else
                        <img src="{{ asset('back/assets/global/plugins/holder.js/100%x200') }}" alt=""
                             style="width: 100%; height: 200px;">
                    @endif
                    <div class="caption">
                        <hp>
                            @if($banner->description)
                                {{ truncate_html($banner->back_office_title, 80, $suffix = '…', $isHTML = true) }}
                            @else
                                - No Description -
                            @endif
                        </hp>
                        <p>
                            @can('back.banners.edit')
                                <a href="{{ route('back.banners.edit', $banner->id) }}"
                                   class="btn blue"> {{ __('og.button.edit') }} </a>
                            @endcan
                            @can('back.banners.destroy')
                                <a href="javascript:;" class="btn btn-sm red"
                                   onclick="event.preventDefault(); document.getElementById('delete-form-{{ $banner->id }}').submit();"> {{ __('og.button.delete') }} </a>
                        <form action="{{ route('back.banners.destroy', $banner->id) }}" method="POST"
                              id="delete-form-{{ $banner->id }}"
                              style="display: none;">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                        </form>
                        @endcan
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $banners->links() }}

    {!! set_box_foot() !!}

@endsection

@section('js')
    <script src="{{ asset('back/assets/global/plugins/holder.js') }}" type="text/javascript"></script>

    @include('back._common.datatables.toggleStatusJs', [
        'route' => 'back.banners.index'
    ])
@stop
