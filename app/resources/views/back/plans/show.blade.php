@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.plans.show', $plan->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.plans.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{ __('og.plans.is_active') }}</th>
            <td>
                @if($plan->is_active)
                    <span class="label label-success">Active</span>
                @else
                    <span class="label label-danger">Inactive</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('og.plans.order') }}</th>
            <td>
                {{ $plan->order }}
            </td>
        </tr>
        <tr>
            <th>{{ __('og.plans.aspim') }}</th>
            <td>
                @php
                    $aspim=App\Models\Cms\Aspim::where('id', $plan->aspim_id)
                    ->first();
                @endphp
                <a href="{{route('back.aspims.show', ['id' => $aspim->aspim_id])}}">{{ $aspim->name}}</a>
            </td>
        </tr>
        @if (!$plan->getMedia()->isEmpty())
            <tr>
                <th>{{ __('og.plans.plan') }}</th>
                <td>
                    <a href="{{ $plan->getMedia()->first()->getFullUrl() }}" download>
                        {{ $plan->getMedia()->first()->file_name }}
                    </a>
                </td>
            </tr>
        @endif
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.plans.index')
                    <a class="btn btn-default btn-xs"
                       href="{{route('back.plans.index', ['menu_id' => $plan->menu_id]) }}"><span
                            class="glyphicon glyphicon-eye-open"></span> File </a>
                @endcan
                @can('back.plans.edit')
                    <a class="btn btn-primary btn-xs" href="{{route('back.plans.edit', $plan->id)}}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.plans.destroy')
                    <form style="display:inline" action="{{route('back.plans.destroy', $plan->id)}}" method="POST">
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
    <strong>{{__('og.plans.name')}}:</strong>
    <p>
        {{ $plan->name }}
    </p>

    <hr>
    <strong>{{__('og.plans.description')}}:</strong>
    <p>
        {{$plan->description}}
    </p>

    {!! set_box_foot() !!}

@endsection
