@extends(front_dir().'.layouts.app')

@if(isset($menu))
@section('meta_title')
    {{ $menu->meta_title??get_cached_parameters('website_name') }}
@endsection
@section('meta_description')
    {{ $menu->meta_description??get_cached_parameters('website_name') }}
@endsection
@endif

@section('content')
    @yield('main_content')
@endsection
