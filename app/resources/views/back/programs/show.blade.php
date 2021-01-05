@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.programs.show', $program->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.programs.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.programs.is_active')}}</th>
            <td>{!! format_label_is_active($program) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.programs.title')}}</th>
            <td>{{ $program->title }}</td>
        </tr>
        <tr>
            <th>{{__('og.programs.established_at')}}</th>
            <td>{{ $program->established_at }}</td>
        </tr>
        <tr>
            <th>{{__('og.programs.aspims')}}</th>
            <td>
                @if($program->aspims->isNotEmpty())
                    @foreach($program->aspims as $aspim)
                        <a href="{{ route('back.aspims.edit', $aspim->aspim->id) }}">{{ $aspim->aspim->name }}</a> /
                    @endforeach
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>{{__('og.programs.program_page_id')}}</th>
            <td>
                {{($linkedPage)?$linkedPage->label:'-'}}
            </td>
        </tr>
        <tr>
            <th>{{__('og.programs.order')}}</th>
            <td>{{ $program->order }}</td>
        </tr>
        <tr>
            <th>{{__('og.programs.description')}}</th>
            <td>{{ strip_tags($program->description) }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                <a class="btn btn-primary btn-xs" href="{{ route('back.programs.edit', $program->id) }}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                <form style="display:inline" action="{{ route('back.programs.destroy', $program->id) }}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="_method" value="DELETE">
                    <span data-placement="top" data-toggle="tooltip" title="Supprimer">
                            <button class="btn btn-danger btn-xs" type="submit"
                                    onclick="return confirm('{{__('og.alert.confirm_deletion')}}')">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </span>
                </form>
            </td>
        </tr>
    </table>

    {!! set_box_foot() !!}

@endsection
