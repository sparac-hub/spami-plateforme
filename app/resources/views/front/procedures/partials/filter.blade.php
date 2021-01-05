<div class="container_search">
    <form class="form_search row" method="get" action="" novalidate="novalidate">
        <div class="col-xs-12 col-sm-6 col-md-4">
            <input type="text" id="keywords" name="recherche" class="input_recherche"
                   placeholder="{{__('og.procedures.recherche')}}" autocomplete="off">

        </div>
        @if($aspim->count())
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="select_box_spa">
                    <select class="" id="aspim">
                        <option value="">{{__('og.procedures.aspim')}}</option>
                        @foreach($aspim as $as)
                            <option value={{$as->aspim_id}}>{{$as->name}}</option>
                        @endforeach

                    </select>
                </div>
            </div>
        @endif

        <div class="col-xs-12 col-sm-6 col-md-4">
            <input type="texte" id="included_at" name="included_at" class=" input_recherche"
                   placeholder="{{ __('sparac.aspims.filter_included_at') }}"
                   value="{{  request('included_at')}}" autocomplete="off">

            {{--            <input id="date_filter" type="texte" name="recherche" class="input_annee_recherche input_recherche"
                               placeholder="ANNEE D'INCULSION"  autocomplete="off">--}}
            {{--<input id="date_filter" type="number">--}}
            {{--<div class="input-group date datepicker" >--}}
            {{--<input type="text" class="input_spa input_datepicker" placeholder="Date" />--}}
            {{--<span class="input-group-addon input_pico" >--}}
            {{--<i class="fa fa-calendar-check-o" aria-hidden="true" ></i >--}}
            {{--</span >--}}
            {{--</div >--}}
        </div>
    </form>
</div>
