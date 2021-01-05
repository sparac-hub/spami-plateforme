<div class="container_search">
    <div class="col-xs-12 col-sm-4 col-md-4">
        <input type="text" name="keywords" id="keywords" class="input_recherche"
               placeholder="{{ __('og.trainings.rechercher') }}"
               autocomplete="off">
    </div>

    @if($outil_gestion_categories->count())
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="select_box_spa">
                <select class="" id="category">
                    <option value="">{{ __('og.outil_gestions.type') }}</option>
                    <option value="{{ \App\Models\Cms\OutilGestion::GUIDELINE }}">
                        GUIDELINE
                    </option>
                    <option value="{{ \App\Models\Cms\OutilGestion::VIDEO }}">
                        VIDEO
                    </option>
                    <option value="{{ \App\Models\Cms\OutilGestion::LIEN }}">
                        LIEN
                    </option>
                    <option value="{{ \App\Models\Cms\OutilGestion::MANUEL }}">
                        MANUEL
                    </option>
                </select>
            </div>
        </div>
    @endif

    @if($aspims->count())
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="select_box_spa">
                <select class="" id="aspim">
                    <option value="">{{ __('og.outil_gestions.aspim') }}</option>
                    @foreach($aspims as $aspim)
                        <option value="{{ $aspim->aspim_id }}">{{ $aspim->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif

</div>

