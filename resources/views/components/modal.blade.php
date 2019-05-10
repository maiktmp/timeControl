@php
    $modalSize = isset($modalSize)? $modalSize :'modal-lg';
    $modalId = isset($modalId)? $modalId :'modal';
@endphp

<div id='{{$modalId}}' class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog {{$modalSize}}">
        <div class="modal-content">
            @if(isset($title))
                <div class="modal-header">
                    <h5 class="modal-title">{{$title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="color-white">&times;</span>
                    </button>
                </div>
            @endif
            <div class="modal-body">
                <div class="row text-right">
                    <div class="col-12">
                        @if(!isset($title))
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        @endif
                    </div>
                </div>
                <div class="body-content"></div>
            </div>
        </div>
    </div>
</div>