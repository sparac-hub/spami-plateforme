<div class="portlet-title">
    <div class="caption">
        {{$widget->name}}
    </div>
    <div class="tools">
        <a href="
        @if(\Request::route()->getName() == 'back.front_home.index')
        {{route('back.front_home.edit',$widget->id)}}
        @else
        {{route('back.widgets.edit',$widget->id)}}
        @endif"
           data-toggle="modal" class="config"
           data-original-title="{{__('og.box_title.edit')}}" title="{{__('og.box_title.edit')}}"> </a>
        <a href="" class="fullscreen" data-original-title="" title=""> </a>
        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
    </div>
</div>