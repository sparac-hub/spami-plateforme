@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.gestionnaire_aspim.show', $gest_aspim->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.gestionnaire_aspim.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">

        <tr>
            <th>{{__('og.gestionnaire_aspim.is_active')}}</th>
            <td>{!! format_label_is_active($gest_aspim) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.gestionnaire_aspim.name')}}</th>
            <td>{{  $gest_aspim->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.gestionnaire_aspim.surname')}}</th>
            <td>{{  $gest_aspim->surname}}</td>
        </tr>
        <tr>
            <th>{{__('og.gestionnaire_aspim.slug')}}</th>
            <td>{{ $gest_aspim->slug }}</td>
        </tr>
        <tr>
            <th>{{__('og.gestionnaire_aspim.tel')}}</th>
            <td>{{ $gest_aspim->tel }}</td>
        </tr>
        <tr>
            <th>{{__('og.gestionnaire_aspim.mobile')}}</th>
            <td>{{ $gest_aspim->mobile }}</td>
        </tr>
        <tr>
            <th>{{__('og.gestionnaire_aspim.fax')}}</th>
            <td>{{ $gest_aspim->fax }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.gestionnaire_aspim.edit')
                    <a class="btn btn-primary btn-xs"
                       href="{{ route('back.gestionnaire_aspim.edit', $gest_aspim->id) }}"><span
                                class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.aspims.destroy')
                    <form style="display:inline"
                          action="{{ route('back.gestionnaire_aspim.destroy', $gest_aspim->id) }}" method="POST">
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
    @if (!$gest_aspim->getMedia()->isEmpty())
        <p>
            <img src="{{ $gest_aspim->getMedia()->first()->getFullUrl() }}" height="390px"/>
        </p>
    @endif

    <strong>{{__('og.aspims.name')}}:</strong>
    <p>
        {{ $gest_aspim->name }}
    </p>

    <hr>
    <strong>{{__('og.aspims.description')}}:</strong>
    <p>
        {{ strip_tags($gest_aspim->description) }}
    </p>

    {!! set_box_foot() !!}

@endsection
