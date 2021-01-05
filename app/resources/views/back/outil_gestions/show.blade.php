@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.outil_gestions.show', $outil_gestion->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.outil_gestions.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        @if($outil_gestion->outil_gestion_category_id)
            <tr>
                <th>{{__('og.outil_gestions.category')}}</th>
                <td>
                    <a href="{{ route('back.outil_gestion_categories.show', $outil_gestion->outil_gestion_category_id) }}">
                        {{ $outil_gestion->category->name }}
                    </a>
                </td>
            </tr>
        @endif
        <tr>
            <th>{{__('og.outil_gestions.is_active')}}</th>
            <td>{!! format_label_is_active($outil_gestion) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.outil_gestions.type')}}</th>
            @php
                $type = '';
                    if($outil_gestion->type  == \App\Models\Cms\OutilGestion::GUIDELINE){
                        $type = 'GUIDELINE';
                    }else if($outil_gestion->type  == \App\Models\Cms\OutilGestion::VIDEO){
                        $type = 'VIDEO';
                    }else if($outil_gestion->type  == \App\Models\Cms\OutilGestion::LIEN){
                        $type = 'LIEN';
                    }else if($outil_gestion->type  == \App\Models\Cms\OutilGestion::MANUEL){
                        $type = 'MANUEL';
                    }
            @endphp
            <td>{{ $type }}</td>
        </tr>
        <tr>
            @if($outil_gestion->type  == \App\Models\Cms\OutilGestion::GUIDELINE)
                @if (!$outil_gestion->getMedia('file_guideline')->isEmpty())
                    <th>{{__('og.outil_gestions.document')}} </th>
                    <td><a href="{{ $outil_gestion->getMedia('file_guideline')->first()->getFullUrl() }}" download="">
                            {{ $outil_gestion->getMedia('file_guideline')->first()->file_name }}
                        </a></td>
                @endif
            @endif
            @if($outil_gestion->type  == \App\Models\Cms\OutilGestion::VIDEO)
                <th>{{__('og.outil_gestions.url_video')}} </th>
                <td>{{ $outil_gestion->url_video }}</td>
            @endif
            @if($outil_gestion->type  == \App\Models\Cms\OutilGestion::LIEN)
                <th>{{__('og.outil_gestions.url_lien')}} </th>
                <td>{{ $outil_gestion->url_lien }}</td>
            @endif
            @if($outil_gestion->type  == \App\Models\Cms\OutilGestion::MANUEL)
                @if (!$outil_gestion->getMedia('file_manuel')->isEmpty())
                    <th>{{__('og.outil_gestions.document')}} </th>
                    <td><a href="{{ $outil_gestion->getMedia('file_manuel')->first()->getFullUrl() }}" download="">
                            {{ $outil_gestion->getMedia('file_manuel')->first()->file_name }}
                        </a></td>
                @endif
            @endif
        </tr>
        <tr>
            <th>{{__('og.outil_gestions.name')}}</th>
            <td>{{ $outil_gestion->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.outil_gestions.slug')}}</th>
            <td>{{ $outil_gestion->slug }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.outil_gestions.edit')
                    <a class="btn btn-primary btn-xs"
                       href="{{ route('back.outil_gestions.edit', $outil_gestion->id) }}"><span
                                class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.outil_gestions.destroy')
                    <form style="display:inline" action="{{ route('back.outil_gestions.destroy', $outil_gestion->id) }}"
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
