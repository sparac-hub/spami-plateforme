@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.category_forums.create') }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.category_forums.create'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.category_forums.store') }}" method="post" class="form-create"
          enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label>{{__('og.category_forums.name')}} *</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label>{{__('og.category_forums.color')}} *</label>
            <input type="text" class="form-control" name="color" value="{{ old('color') }}">
        </div>

        <div class="form-group">
            <label>{{__('og.category_forums.parent_id')}}</label>
            <select class="form-control" name="parent_id">
                <option value="">---</option>
                @if($categories)
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                                @if(old('parent_id') == $category->id) selected @endif
                        >{{ $category->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.category_forums.order')}} *</label>
            <input type="number" class="form-control" name="order" value="{{ old('order', 1) }}">
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.create')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection


@section('js')
    <script src="{{asset('back/assets/apps/scripts/todo-2.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset("back/assets/global/plugins/jquery-validation/js/jquery.validate.min.js") }}"
            type="text/javascript"></script>
    <script src="{{ asset("back/assets/global/plugins/jquery-validation/js/localization/messages_".locale().".js") }}"
            type="text/javascript"></script>
    @include('back._common.js.summernote-with-lfm')
@endsection
