<div class="container_search">
    <form class="form_search row" method="get" action="" novalidate="novalidate">
        <div class="col-xs-12 col-sm-4 col-md-4">
            <input type="text" name="keywords" class="input_recherche input_search"
                   placeholder="{{ __('sparac.aspims.keywords') }}"
                   autocomplete="off" value="{{  request('keywords')}}" id="keywords">
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            @if($aspims->isNotEmpty())
                <div class="select_box_spa">
                    <select class="" id="aspim" name="aspim">
                        <option value="" selected>{{ __('sparac.aspims.filter_aspims') }}</option>
                        @foreach(collection_sort_by($aspims) as $aspim)
                            <option value="{{ $aspim->id }}" @if(request('country') == $aspim->id) selected @endif>
                                {{ $aspim->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
        @if($countries->count())
            <div class="col-xs-12 col-sm-2 col-md-2">
                <div class="select_box_spa">
                    <select class="" id="country" name="country">
                        <option value="" selected>{{ __('sparac.aspims.filter_countries') }}</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}" @if(request('country') == $country->id) selected @endif>
                                {{ $country->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endif
        <div class="col-xs-12 col-sm-2 col-md-2">
            <input type="number" min="0" id="included_at" name="included_at" class="input_recherche"
                   placeholder="{{ __('sparac.aspims.filter_included_at') }}"
                   value="{{  request('included_at')}}" autocomplete="off">
        </div>
    </form>
</div>
