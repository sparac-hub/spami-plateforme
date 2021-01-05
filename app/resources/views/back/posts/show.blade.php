@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.details').'Post' , false) !!}

    @include('back._common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.post_categories.is_active')}}</th>
            <td>{!! format_label_is_active($post) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.post_categories.order')}}</th>
            <td>{{ $post->order }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.posts.edit')
                    <a class="btn btn-primary btn-xs" href="{{route('back.posts.edit', $post->id)}}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.posts.destroy')
                    <form style="display:inline" action="{{route('back.posts.destroy', $post->id)}}"
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

    <hr>

    <h1>{{ $post->translateOrNew(locale())->title }}</h1>

    {{ $post->translateOrNew(locale())->content }}

    {!! set_box_foot() !!}

@endsection
