@if($programs->isNotEmpty())
    <div class="container_search">
        <div class="col-xs-12 col-sm-8 col-md-8">
            <input type="text" name="recherche" class="input_recherche input_search"
                   placeholder="Rechercher dans la liste des ASPIM" autocomplete="off">
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="select_box_spa">
                <select class="program_aspims" id="program">
                    <option value="">Liste des jumelages</option>
                    @foreach($programs as $program)
                        <option value="{{$program->id}}">{{$program->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
@endif
