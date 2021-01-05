<div class="container_search">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <input type="text" name="keywords" class="input_recherche"
               placeholder="{{ __('og.trainings.rechercher') }}"
               autocomplete="off">
    </div>

    {{-- @if($training_categories->count())
         <div class="col-xs-12 col-sm-4 col-md-4">
             <div class="select_box_spa">
                 <select class="" id="pays_aspim">
                     @foreach($training_categories as $training_category)
                         <option value="{{ $training_category->id }}">{{ $training_category->name }}</option>
                     @endforeach
                 </select>
             </div>
         </div>
     @endif--}}

</div>
