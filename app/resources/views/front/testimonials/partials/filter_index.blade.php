<form class="form_plans" action="{{route('front.routes.index', $menu->slug)}}">
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="keywords"
               placeholder="{{__('og.front_filter.keywords')}}" value="{{request('keywords')}}">
    </div>

    @if($testimonial_categories)
        <div class="form-group col-md-6">
            <select class="selectpicker  form-control" title="{{__('og.front_filter.category')}}" name="category">
                <option value="">---</option>
                @foreach($testimonial_categories as $testimonial_category)
                    <option value="{{ $testimonial_category->id }}"
                        {{ (request('category') == $testimonial_category->id)?'selected':'' }}>
                        {{ $testimonial_category->title }}
                    </option>
                @endforeach
            </select>
        </div>
    @endif
    <div class="row">
        <div class="col-md-6 col-md-offset-6">
            <div class="row">
                <div class="col-xs-6">
                    <div class="form-group">
                        <button type="submit"
                                class="btn-fill btn-black btn-block">{{__('og.front_filter.submit')}}</button>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <a type="reset" href="{{route('front.routes.index', $menu->slug)}}"
                           class="btn-fill btn-black btn-block">{{__('og.front_filter.reset')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
