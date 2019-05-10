@php
    /* @var $group \App\Http\Model\Group*/
@endphp

@push('scripts')
    <script type="text/javascript" src="{{asset('/js/moment.min.js?v=1')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/es.js"></script>
    <script type="text/javascript" src="{{asset('/js/bootstrap-material-datetimepicker.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.inp-datepicker').bootstrapMaterialDatePicker({
                date: false,
                lang: 'es',
                format: 'HH:mm'
            });
        });
    </script>

@endpush

@push('css')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endpush

<div class="row">
    <div class="col-12">
        @input([
            'label'=>"Nombre del grupo",
            'name'=>"name",
            'value'=>isset($group)?$group->name:old('name'),
        ])
    </div>
    <div class="col-6">
        @input([
            'label'=>"Hora de inicio",
            'inputClass'=>"inp-datepicker",
            'name'=>"start_hour",
            'value'=>isset($group)?$group->start_hour:old('start_hour'),
        ])
    </div>
    <div class="col-6">
        @input([
            'label'=>"Hora de fin",
            'inputClass'=>"inp-datepicker",
            'name'=>"end_hour",
            'value'=>isset($group)?$group->end_hour:old('end_hour'),
        ])
    </div>
</div>