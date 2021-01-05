@extends('back.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">
                        <div class="panel blank-panel col-lg-8">

                            <div class="panel blank-panel">

                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#tab-1">First Tab</a></li>
                                            <li class=""><a data-toggle="tab" href="#tab-2">Second Tab</a></li>
                                            <li class=""><a data-toggle="tab" href="#tab-2">Second Tab</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="tab-content">
                                        <div id="tab-1" class="tab-pane active">
                                            <strong>Lorem ipsum dolor sit amet, consectetuer adipiscing</strong>

                                            <p>A wonderful serenity has taken possession of my entire soul, like these
                                                sweet mornings of spring which I enjoy with my whole heart. I am alone,
                                                and feel the charm of existence in this spot, which was created for the
                                                bliss of souls like mine.</p>

                                            <p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere
                                                tranquil existence, that I neglect my talents. I should be incapable of
                                                drawing a single stroke at the present moment; and yet I feel that I
                                                never was a greater artist than now. When.</p>
                                        </div>

                                        <div id="tab-2" class="tab-pane">
                                            <strong>Donec quam felis</strong>

                                            <p>Thousand unknown plants are noticed by me: when I hear the buzz of the
                                                little world among the stalks, and grow familiar with the countless
                                                indescribable forms of the insects and flies, then I feel the presence
                                                of the Almighty, who formed us in his own image, and the breath </p>

                                            <p>I am alone, and feel the charm of existence in this spot, which was
                                                created for the bliss of souls like mine. I am so happy, my dear friend,
                                                so absorbed in the exquisite sense of mere tranquil existence, that I
                                                neglect my talents. I should be incapable of drawing a single stroke at
                                                the present moment; and yet.</p>

                                        </div>


                                        <div id="tab-3" class="tab-pane">
                                            <strong>Donec quam felis</strong>

                                            <p>Thousand unknown plants are noticed by me: when I hear the buzz of the
                                                little world among the stalks, and grow familiar with the countless
                                                indescribable forms of the insects and flies, then I feel the presence
                                                of the Almighty, who formed us in his own image, and the breath </p>

                                            <p>I am alone, and feel the charm of existence in this spot, which was
                                                created for the bliss of souls like mine. I am so happy, my dear friend,
                                                so absorbed in the exquisite sense of mere tranquil existence, that I
                                                neglect my talents. I should be incapable of drawing a single stroke at
                                                the present moment; and yet.</p>

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="col-lg-4">
                            <h2>head2</h2>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    @include('back._common.js.tinymce')
    <script type="text/javascript">
        $(document).ready(function () {
            //progress bar
            $('.progress-spec').hide();

            //editor tinymce
            tinymce.init({
                mode: 'specific_textareas',
                editor_selector: 'summernote',
                height: 300,
                menubar: false,
                relative_urls: false,
                remove_script_host: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen code',
                    'insertdatetime media table contextmenu paste textcolor colorpicker'
                ],
                toolbar: 'undo redo | styleselect | visualblocks bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor | link image media | charmap insertdatetime table | code fullscreen ',
                content_css: '//www.tinymce.com/css/codepen.min.css',
                extended_valid_elements: 'img[class=myclass|!src|border:0|alt|title|width|height|style],i[*],a[*],iframe[*]',
                verify_html: false,
                code_dialog_width: 900,
                /*file_picker_callback   : elFinderBrowser*/
            });
        });

    </script>
@endsection
