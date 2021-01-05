@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.testimonial_categories.show', $testimonial_category->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.testimonial_categories.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.testimonial_categories.is_active')}}</th>
            <td>{!! format_label_is_active($testimonial_category) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.testimonial_categories.title')}}</th>
            <td>{{ $testimonial_category->title }}</td>
        </tr>
        <tr>
            <th>{{__('og.testimonial_categories.slug')}}</th>
            <td>{{ $testimonial_category->slug }}</td>
        </tr>
        <tr>
            <th>{{__('og.testimonial_categories.order')}}</th>
            <td>{{ $testimonial_category->order }}</td>
        </tr>
        <tr>
            <th>{{__('og.testimonial_categories.description')}}</th>
            <td>{{ $testimonial_category->description }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.testimonial_categories.edit')
                    <a class="btn btn-primary btn-xs"
                       href="{{ route('back.testimonial_categories.edit', $testimonial_category->id) }}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.testimonial_categories.destroy')
                    <form style="display:inline"
                          action="{{ route('back.testimonial_categories.destroy', $testimonial_category->id) }}"
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

    {!! set_box_foot()  !!}


@endsection
