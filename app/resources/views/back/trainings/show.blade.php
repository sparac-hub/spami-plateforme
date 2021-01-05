@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.trainings.show', $training->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.trainings.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.trainings.category')}}</th>
            <td>
                @if($training->training_category_id)
                    <a href="{{ route('back.training_categories.show', $training->training_category_id) }}">
                        {{ $training->category->name ?? null}}
                    </a>
                @endif
            </td>
        </tr>
        <tr>
            <th>{{__('og.trainings.is_active')}}</th>
            <td>{!! format_label_is_active($training) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.trainings.menu_id')}}</th>
            <td>{{ $training->menu_id }}</td>
        </tr>
        <tr>
            <th>{{__('og.trainings.slug')}}</th>
            <td>{{ $training->slug }}</td>
        </tr>
        <tr>
            <th>{{__('og.trainings.name')}}</th>
            <td>{{ $training->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.trainings.lien_video')}}</th>
            <td>{{ $training->url }}</td>
        </tr>
        <tr>
            <th>{{__('og.trainings.meta_title')}}</th>
            <td>{{ $training->meta_title }}</td>
        </tr>
        <tr>
            <th>{{__('og.trainings.meta_description')}}</th>
            <td>{{ $training->meta_description }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.trainings.edit')
                    <a class="btn btn-primary btn-xs" href="{{ route('back.trainings.edit', $training->id) }}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.trainings.destroy')
                    <form style="display:inline" action="{{ route('back.trainings.destroy', $training->id) }}"
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

    {!! set_box_foot() !!}

@endsection
