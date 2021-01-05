@php
    $breadcrumbs = \App\Services\Cms\CmsBreadcrumb::getTree();
@endphp

<!-- BEGIN PAGE BREADCRUMBS -->
<div class="breadcrumb_spa">
    @foreach ($breadcrumbs as $k => $breadcrumb)

        @if ($breadcrumb['url'])
            <a href="{{ $breadcrumb['url'] }}" class="breadcrumb_home"
               title="{{ $breadcrumb['label'] }}">
                {{ $breadcrumb['label'] }}
            </a>
            <span class="separator">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </span>
        @else
            <span class="breadcrumb_current_page">{{ $breadcrumb['label'] }}</span>
        @endif

    @endforeach
</div>
<!-- END PAGE BREADCRUMBS -->