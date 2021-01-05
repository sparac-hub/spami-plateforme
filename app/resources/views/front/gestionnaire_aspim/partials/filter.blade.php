<div class="container_search">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <input type="text" name="keywords" class="input_recherche" id="keywords"
               placeholder="{{ __('og.gestionnaire_aspim.recherceh_aspim') }}" autocomplete="off">
    </div>
    @if($countries->count())
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="select_box_spa">
                <select class="" id="countrie" name="countrie">
                    <option value="">{{ __('sparac.aspims.filter_countries') }}</option>
                    @foreach($countries as $countrie)
                        <option value="{{ $countrie->id }}">{{ $countrie->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
    @if($aspims->count())
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="select_box_spa">
                <select class="" id="aspim" name="aspim">
                    <option value="">{{ __('og.outil_gestions.aspim') }}</option>
                    @foreach($aspims as $aspim)
                        <option value="{{ $aspim->aspim_id }}">{{ $aspim->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
</div>