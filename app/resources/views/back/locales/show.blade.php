@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.details').'Locale' , false) !!}

    @include('back._common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.locales.reference')}}</th>
            <td>{{ $locale->reference }}</td>
        </tr>
        <tr>
            <th>{{__('og.locales.name')}}</th>
            <td>{{ $locale->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.locales.is_default')}}</th>
            <td>{{ $locale->is_default }}</td>
        </tr>
        <tr>
            <th>{{__('og.locales.is_active')}}</th>
            <td>{!! format_label_is_active($locale) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.locales.edit')
                    <a class="btn btn-primary btn-xs" href="{{route('back.locales.edit', $locale->id)}}"><span
                                class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.locales.destroy')
                    <form style="display:inline" action="{{route('back.locales.destroy', $locale->id)}}" method="POST">
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
