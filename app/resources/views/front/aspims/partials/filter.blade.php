<div class="container_search">
    <form class="form_search row" method="get" action="" novalidate="novalidate">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <input type="text" name="keywords" class="input_recherche" placeholder="{{ __('sparac.aspims.keywords') }}"
                   autocomplete="off" value="{{  request('keywords')}}" id="keywords">
        </div>
        @if($countries->count())
            <div class="col-xs-12 col-sm-3 col-md-3">
                <div class="select_box_spa">
                    <select class="" id="country" name="country">
                        <option value="" selected>{{ __('sparac.aspims.filter_countries') }}</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->country_id }}"
                                    @if(request('country') == $country->id) selected @endif>
                                {{ $country->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endif
        <div class="col-xs-12 col-sm-3 col-md-3">
            <input type="texte" id="included_at" name="included_at" class="input_annee_recherche input_recherche"
                   placeholder="{{ __('sparac.aspims.filter_included_at') }}"
                   value="{{  request('included_at')}}" autocomplete="off">
        </div>
    </form>
</div>
