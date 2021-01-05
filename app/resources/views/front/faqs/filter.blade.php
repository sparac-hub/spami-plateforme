<form method="GET" class="form_actuality" action="{{ route('front.routes.index', $menu->slug) }}">
    <div class="row">
        <div class="form-group col-md-6">
            <input type="text" name="keywords" id="keywords" class="form-control haicop-input"
                   value="{{ request('keywords') }}" placeholder="keywords"/>
        </div>

        @if($faq_categories)
            <div class="form-group col-md-6">
                <select class="selectpicker haicop-select form-control" title="Category"
                        id="category" name="category">
                    <option value="">---</option>
                    @foreach($faq_categories as $faq_category)
                        <option value="{{ $faq_category->id }}"
                                {{ (request('category') == $faq_category->id)?'selected':'' }}>
                            {{ $faq_category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-6">
            <div class="row">
                <div class="col-xs-6">
                    <div class="form-group">
                        <button type="submit"
                                class="btn-fill btn-black btn-block">Search
                        </button>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <a type="reset" href="{{route('front.routes.index', $menu->slug)}}"
                           class="btn-fill btn-black btn-block">Reset
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
