<div class="tools">
    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
</div>

<div class="actions">
    @if($widget->home_id == \App\Models\Cms\Widget::HOME_PAGE)
        @if($widget->select_type == 'free_select')
            <a href="{{route('back.front_home.show',$widget->id)}}"
               class="btn btn-circle btn-icon-only btn-default">
                <i class="icon-eye"></i>
            </a>
        @endif
        <a href="{{route('back.front_home.edit',$widget->id)}}"
           data-toggle="modal"
           data-original-title="{{__('og.box_title.edit')}}"
           title="{{__('og.box_title.edit')}}"
           class="btn btn-circle btn-icon-only btn-default">
            <i class="icon-wrench"></i>
        </a>
    @else

        @if($widget->select_type == 'free_select')
            <a href="{{route('back.widgets.show',$widget->id)}}"
               class="btn btn-circle btn-icon-only btn-default">
                <i class="icon-eye"></i>
            </a>
        @endif

        <a href="{{route('back.widgets.edit',$widget->id)}}"
           data-toggle="modal"
           data-original-title="{{__('og.box_title.edit')}}"
           title="{{__('og.box_title.edit')}}"
           class="btn btn-circle btn-icon-only btn-default">
            <i class="icon-wrench"></i>
        </a>

        <a class="btn btn-circle btn-icon-only btn-default" href="#" data-toggle="modal"
           data-target="#confirm-delete-widget">
            <i class="icon-trash"></i>
        </a>

        <div class="modal fade bs-modal-sm" id="confirm-delete-widget" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <form action="{{route('back.widgets.destroy',$widget->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Confirmationd de suppression</h4>
                        </div>
                        <div class="modal-body">

                            Voulez-vous vraiement supprimer cet enregistrement?

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline"
                                    data-dismiss="modal">{{ __('og.button.cancel') }}</button>
                            <button type="submit" class="btn red">{{ __('og.button.delete') }}</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endif
    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title=""
       title=""> </a>
</div>
