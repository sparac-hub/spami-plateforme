{{--<div class="breadcrumb_spa">
    <a href="/" title="Accueil" class="breadcrumb_home">ACCUEIL</a> <span
            class="separator"><i aria-hidden="true" class="fa fa-angle-right"></i></span> <span
            class="breadcrumb_current_page"> LISTE DES ASPIM</span></div>--}}
<div class="container_search">

    <div class="col-xs-12 col-sm-6 col-md-6"><input type="text" name="keywords"
                                                    placeholder="Recherche par mot clé"
                                                    autocomplete="off" class="input_recherche">
    </div>
    @if($categories->count())
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="select_box_spa">
                <select id="pays">
                    <option value="">Select theme</option>
                    @foreach($categories as $currentCateg)
                        <option value="{{$currentCateg->id}}">{{$currentCateg->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
    <div class="col-xs-12 col-sm-3 col-md-3"><input type="date" lang="fr" name="date" id="date"
                                                    placeholder="MM/DD/YYYY" autocomplete="off"
                                                    class="input_recherche"></div>

</div>