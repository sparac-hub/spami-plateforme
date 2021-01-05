@extends(front_dir().'.layouts.home')

@php
    $menu = App\Models\Cms\Menu::whereHas('module', function ($query){
                $query->whereReference('home');
            })->first();
@endphp

@section('meta_title'){{$menu->meta_title}}@endsection

@section('meta_description'){{$menu->meta_description}}@endsection

@section('content')
    @include('front.home.partials.first_banners')

@endsection
