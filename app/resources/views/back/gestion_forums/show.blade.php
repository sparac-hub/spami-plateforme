@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.gestion_forums.show') }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.gestion_forums.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.gestion_forums.user_name')}}</th>
            <td>{{ optional($forum->user)->{config('chatter.user.database_field_with_user_name')} }}</td>
        </tr>
        <tr>
            <th>{{__('og.gestion_forums.title')}}</th>
            <td>{{ $forum->title }}</td>
        </tr>
        <tr>
            <th>{{__('og.gestion_forums.category')}}</th>
            <td>{{ optional($forum->category)->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.gestion_forums.views')}}</th>
            <td>{{ $forum->views }}</td>
        </tr>
        <tr>
            <th>{{__('og.gestion_forums.sticky')}}</th>
            <td>{{ $forum->sticky }}</td>
        </tr>
        <tr>
            <th>{{__('og.gestion_forums.answered')}}</th>
            <td>{{ $forum->answered }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.gestion_forums.destroy')
                    <form style="display:inline" action="{{ route('back.gestion_forums.destroy', $forum->id) }}"
                          method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="DELETE">
                        <span data-placement="top" data-toggle="tooltip" title="Supprimer">
                            <button class="btn btn-danger btn-xs" type="submit"
                                    onclick="return confirm('{{__('og.alert.confirm_deletion')}}')">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </span>
                    </form>
                @endcan
            </td>
        </tr>
    </table>

    @foreach($forum->posts as $key => $post)
        <p><strong>{{ optional($post->user)->name }} :</strong></p>
        <p>{!! $post->body !!}</p>
        <hr>
        @if($key > 0)
            <p> {!! getDeleteButtonAttribute($post->id, 'post_forums') !!}</p>
            <hr>
        @else
            <h1>{{ __('og.gestion_forums.post_tite') }}</h1>
            <hr>
        @endif
    @endforeach

    {!! set_box_foot() !!}

@endsection
