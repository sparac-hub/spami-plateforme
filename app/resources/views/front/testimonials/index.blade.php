@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$menu->meta_title}}@endsection

@section('meta_description'){{$menu->meta_description}}@endsection

@section('content')


    <div class="main-content p80">
        <!--Events Start-->
        <div class="team-grid">
            <div class="container">
                <!--Team Box Start-->
                @if(!($testimonials->isEmpty()))

                    @foreach($testimonials->chunk(2) as $testimonial_chunk)
                        <div class="row">
                            @foreach($testimonial_chunk as $testimonial)
                                <div class="col-md-6">
                                    <div class="team-box">
                                        <div class="team-thumb"><a href="{{ url("#") }}"><i class="fas fa-link"></i></a>
                                            <img src="{{ $testimonial->image }}" alt="{{$testimonial->title}}">
                                        </div>
                                        <div class="team-txt">
                                            <h5>{{$testimonial->title}}</h5>
                                            @if($testimonial->category)
                                                <strong class="dep">{{$testimonial->category->title}}</strong>
                                            @endif
                                            <p>{{$testimonial->description}}</p>
                                            <ul class="team-social">
                                                <li><em>Connect:</em></li>
                                                <li><a href="{{ $testimonial->twitter }}" target="_blank"><i
                                                                class="fab fa-twitter"></i></a>
                                                </li>
                                                <li><a href="{{ $testimonial->facebook }}" target="_blank"><i
                                                                class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="{{ $testimonial->linkedin }}" target="_blank"><i
                                                                class="fab fa-linkedin-in"></i></a></li>
                                                <li><a href="{{ $testimonial->instagram }}" target="_blank"><i
                                                                class="fab fa-instagram"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                @endforeach

                {!! $testimonials->appends(request()->all())->links(front_dir() . '.layouts.app_partials.pagination') !!}
            @endif
            <!--Team Box End-->
            </div>
            <!--Team End-->
        </div>
        <!--Main Content End-->
    </div>
@endsection

@section('head_pagination')
    {!! $testimonials->appends(request()->all())->links(front_dir() . '.layouts.app_partials.head_pagination') !!}
@endsection
