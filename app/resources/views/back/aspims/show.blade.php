@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.aspims.show', $aspim->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.aspims.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.aspims.is_active')}}</th>
            <td>{!! format_label_is_active($aspim) !!}</td>
        </tr>
        <th>{{__('og.aspim_translations.name')}}</th>
        <td>{{ $aspim->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.aspims.slug')}}</th>
            <td>{{ $aspim->slug }}</td>
        </tr>
        <th>{{__('og.aspim_translations.status')}}</th>
        <td>{{ $aspim->status }}</td>
        </tr>
        <th>{{__('og.aspim_translations.creation_text')}}</th>
        <td>{{ $aspim->creation_text }}</td>
        </tr>
        <th>{{__('og.aspims.countries')}}</th>
        <td>
            @if($aspim->countries->isNotEmpty())
                {{ implode(', ', $aspim->countries->pluck('name')->toArray()) }}
            @else
                -
            @endif
        </td>
        </tr>
        <th>{{__('og.aspim_translations.physical_features')}}</th>
        <td>{!! $aspim->physical_features !!}</td>
        </tr>
        <th>{{__('og.aspim_translations.ecological_features')}}</th>
        <td>{!! $aspim->ecological_features !!}</td>
        </tr>
        <th>{{__('og.aspim_translations.threats_and_pressures')}}</th>
        <td>{!! $aspim->threats_and_pressures !!}</td>
        </tr>
        <th>{{__('og.aspim_translations.teritory')}}</th>
        <td>{!! $aspim->teritory !!}</td>
        </tr>
        <th>{{__('og.aspim_translations.mediterranean_importance')}}</th>
        <td>{!! $aspim->mediterranean_importance !!}</td>
        </tr>
        <th>{{__('og.aspim_translations.management_body')}}</th>
        <td>{!! $aspim->management_body !!}</td>
        </tr>
        <th>{{__('og.aspim_translations.geographic_position')}}</th>
        <td>{!! $aspim->geographic_position !!}</td>
        </tr>
        @if($aspim->aspim_category_id)
            <tr>
                <th>{{__('og.aspims.category')}}</th>
                <td>
                    <a href="{{ route('back.aspim_categories.show', $aspim->aspim_category_id) }}">
                        {{ $aspim->category->name }}
                    </a>
                </td>
            </tr>
        @endif
        <th>{{__('og.aspims.website')}}</th>
        <td>{{ $aspim->website }}</td>
        </tr>
        <th>{{__('og.aspims.included_at')}}</th>
        <td>{{ $aspim->included_at }}</td>
        </tr>
        <th>{{__('og.aspims.total_surface')}}</th>
        <td>{{ $aspim->total_surface }}</td>
        </tr>
        <th>{{__('og.aspims.total_surface_marine')}}</th>
        <td>{{ $aspim->total_surface_marine }}</td>
        </tr>
        <th>{{__('og.aspims.width')}}</th>
        <td>{{ $aspim->width }}</td>
        </tr>
        <th>{{__('og.aspims.creation_date')}}</th>
        <td>{{ $aspim->creation_date }}</td>
        </tr>
        <th>{{__('og.aspims.mapamed_feature_id')}}</th>
        <td>{{ $aspim->mapamed_feature_id }}</td>
        </tr>
        @if (!$aspim->getMedia('document')->isEmpty())
            <th>{{__('og.aspims.document')}}</th>
            <td>
                <a href="{{ $aspim->getMedia('document')->first()->getFullUrl() }}">{{ $aspim->getMedia('document')->first()->file_name }}</a>
            </td>
            </tr>
        @endif
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.aspims.edit')
                    <a class="btn btn-primary btn-xs" href="{{ route('back.aspims.edit', $aspim->id) }}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.aspims.destroy')
                    <form style="display:inline" action="{{ route('back.aspims.destroy', $aspim->id) }}" method="POST">
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

    @if (!$aspim->getMedia()->isEmpty())
        <p>
            <img src="{{ $aspim->getMedia()->first()->getFullUrl() }}" height="390px"/>
        </p>
    @endif
    <hr>

    @if (!$aspim->getMedia('aspim_medias')->isEmpty())
        <h4>Gallerie</h4>
        @foreach($aspim->getMedia('aspim_medias') as $key => $media)
            @if($key <= 2)
                <img src="{{ $media->getFullUrl() }}">
            @endif
        @endforeach
        ...
    @endif

    {!! set_box_foot() !!}

@endsection
