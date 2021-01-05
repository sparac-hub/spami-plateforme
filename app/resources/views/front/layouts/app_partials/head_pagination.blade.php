@if ($paginator->hasPages())
    @if (!$paginator->onFirstPage())
        @php($prev = $paginator->previousPageUrl())
        @php($prev = str_replace('?page=1','',$prev))
        @php($prev = str_replace('&page=1','',$prev))
        <link rel="prev" href="{{ $prev }}">
    @endif

    @if ($paginator->hasMorePages())
        <link rel="next" href="{{ $paginator->nextPageUrl() }}">
    @endif
@endif
