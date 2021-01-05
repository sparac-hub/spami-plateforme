@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.schemas.show') }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.schemas.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{ __('og.schemas.is_active') }}</th>
            <td>
                @if($schema->is_active)
                    <span class="label label-success">Active</span>
                @else
                    <span class="label label-danger">Inactive</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('og.schemas.order') }}</th>
            <td>
                {{ $schema->order }}
            </td>
        </tr>
        <tr>
            <th>{{ __('og.plans.aspim') }}</th>
            <td>
                @php
                    $aspim=App\Models\Cms\Aspim::where('id', $schema->aspim_id)
                    ->first();
                @endphp
                <a href="{{route('back.aspims.show', ['id' => $schema->aspim_id])}}">{{ $aspim->name}}</a>
            </td>
        </tr>
        @if (!$schema->getMedia()->isEmpty())
            <tr>
                <th>{{ __('og.schemas.schema') }}</th>
                <td>
                    <a href="{{ $schema->getMedia()->first()->getFullUrl() }}" download>
                        {{ $schema->getMedia()->first()->file_name }}
                    </a>
                </td>
            </tr>
        @endif
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.schemas.index')
                    <a class="btn btn-default btn-xs" href="{{route('back.schemas.index') }}"><span
                            class="glyphicon glyphicon-eye-open"></span> File </a>
                @endcan
                @can('back.schemas.edit')
                    <a class="btn btn-primary btn-xs" href="{{route('back.schemas.edit', $schema->id)}}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.schemas.destroy')
                    <form style="display:inline" action="{{route('back.schemas.destroy', $schema->id)}}" method="POST">
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
    <strong>{{__('og.schemas.name')}}:</strong>
    <p>
        {{ $schema->name }}
    </p>

    <hr>
    <strong>{{__('og.schemas.description')}}:</strong>
    <p>
        {{$schema->description}}
    </p>

    {!! set_box_foot() !!}

@endsection
