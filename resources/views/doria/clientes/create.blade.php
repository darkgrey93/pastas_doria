{{-- Titulo de la pagina --}}
@section('title', 'Clientes')
{{-- Contenido principal --}}
@extends('admin.layouts.app')
@section('content')
   @component('admin.components.panel')
       @slot('title', 'Crear Cliente')
       {!! Form::open([
        'route' => 'admin.clientes.store',
        'method' => 'POST',
        'id' => 'form_crear_clientes',
        'class' => 'form-horizontal form-label-lef',
        'novalidate'
    ])!!}
    @include('doria.clientes._form')
    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
             {{ link_to_route('admin.clientes.index',"Cancelar", [], ['class' => 'btn btn-info']) }}
            {!! Form::submit('Crear cliente', ['class' => 'btn btn-success']) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endcomponent
@endsection
{{-- Estilos necesarios para el formulario --}}
@push('styles')
<!-- PNotify -->
<link href="{{ asset('gentella/vendors/pnotify/dist/pnotify.css') }}" rel="stylesheet">
<link href="{{ asset('gentella/vendors/pnotify/dist/pnotify.buttons.css') }}" rel="stylesheet">
<link href="{{ asset('gentella/vendors/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">
<!-- Select2 -->
<link href="{{ asset('gentella/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
@endpush
{{-- Scripts necesarios para el formulario --}}
@push('scripts')
<!-- validator -->
<script src="{{ asset('gentella/vendors/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('gentella/vendors/parsleyjs/i18n/es.js') }}"></script>
<!-- PNotify -->
<script src="{{ asset('gentella/vendors/pnotify/dist/pnotify.js') }}"></script>
<script src="{{ asset('gentella/vendors/pnotify/dist/pnotify.buttons.js') }}"></script>
<script src="{{ asset('gentella/vendors/pnotify/dist/pnotify.nonblock.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('gentella/vendors/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
{{-- Funciones necesarias por el formulario --}}
@push('functions')
<script type="text/javascript">
     $(document).ready(function () {
        $('.select2_user').select2();
        $('.select2_roles').select2();
        var form = $('#form_crear_clientes');
        $(form).parsley({
            trigger: 'change',
            successClass: "has-success",
            errorClass: "has-error",
            classHandler: function (el) {
                return el.$element.closest('.form-group');
            },
            errorsWrapper: '<p class="help-block help-block-error"></p>',
            errorTemplate: '<span></span>',
        });
         form.submit(function (e) {
             e.preventDefault();
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                dataType: 'json',
                success: function (response, NULL, jqXHR) {
                    $(form)[0].reset();
                    // re-init to show default status
                    $(form).parsley().reset();
                    new PNotify({
                        title: response.title,
                        text: response.msg,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                },
                error: function (data) {
                     var errores = data.responseJSON.errors;
                    var msg = '';
                    $.each(errores, function (name, val) {
                        msg += val + '<br>';
                    });
                    new PNotify({
                        title: "Error!",
                        text: msg,
                        type: 'error',
                        styling: 'bootstrap3'
                    });
                }
            });
        });
    });
 </script>
@endpush