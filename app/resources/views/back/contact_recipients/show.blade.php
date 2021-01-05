@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.contact_recipients.show', $contact_recipient->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('og.box_title.details').'Contact_recipient' , false) !!}

    @include('back._common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>Email</th>
            <td>{{ $contact_recipient->email }}</td>
        </tr>
        <tr>
            <th>Menu</th>
            <td>
                <a href="{{ route('back.contact_messages.index', ['menu_id' => $contact_recipient->menu_id]) }}">
                    {{ optional($contact_recipient->menu)->label }}
                </a>
            </td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.contact_recipients.edit')
                    <a class="btn btn-primary btn-xs"
                       href="{{route('back.contact_recipients.edit', $contact_recipient->id)}}"><span
                                class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.contact_recipients.destroy')
                    <form style="display:inline"
                          action="{{route('back.contact_recipients.destroy', $contact_recipient->id)}}" method="POST">
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

    {!! set_box_foot() !!}

@endsection
