@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.testimonials.show', $testimonial->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.testimonials.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.testimonials.is_active')}}</th>
            <td>{!! format_label_is_active($testimonial) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.testimonials.title')}}</th>
            <td>{{ $testimonial->title }}</td>
        </tr>
        <tr>
            <th>{{__('og.testimonials.order')}}</th>
            <td>{{ $testimonial->order }}</td>
        </tr>
        <tr>
            <th>{{__('og.testimonials.description')}}</th>
            <td>{{ strip_tags($testimonial->description) }}</td>
        </tr>
        @if(isset($testimonial->category))
            <tr>
                <th>{{__('og.testimonials.testimonial_category_id')}}</th>
                <td>{{ $testimonial->category->title }}</td>
            </tr>
        @endif
        <tr>
            <th>{{__('og.testimonials.image')}}</th>
            <td><img src="{{ $testimonial->image }}" width="300"></td>
        </tr>
        <tr>
            <th>{{__('og.testimonials.facebook')}}</th>
            <td>{{ $testimonial->facebook }}</td>
        </tr>
        <tr>
            <th>{{__('og.testimonials.linkedin')}}</th>
            <td>{{ $testimonial->linkedin }}</td>
        </tr>
        <tr>
            <th>{{__('og.testimonials.instagram')}}</th>
            <td>{{ $testimonial->instagram }}</td>
        </tr>
        <tr>
            <th>{{__('og.testimonials.twitter')}}</th>
            <td>{{ $testimonial->twitter }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.testimonials.edit')
                    <a class="btn btn-primary btn-xs"
                       href="{{ route('back.testimonials.edit', $testimonial->id) }}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.testimonials.destroy')
                    <form style="display:inline" action="{{ route('back.testimonials.destroy', $testimonial->id) }}"
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
