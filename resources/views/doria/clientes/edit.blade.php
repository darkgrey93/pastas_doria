{-- Titulo de la pagina --}}
@section('title', 'Clientes')
{{-- Contenido principal --}}
@extends('admin.layouts.app')
@section('content')
   @component('admin.components.panel')
       @slot('title', 'Modificar Clientes')
       {!! Form::model($cliente, [
           'route' => ['admin.clientes.update', $cliente],
           'method' => 'PUT',
           'id' => 'form_modificar_clientes',
           'class' => 'form-horizontal form-label-lef',
           'novalidate'
       ])!!}
       @include('doria.clientes._form')
       <div class="ln_solid"></div>
       <div class="form-group">
           <div class="col-md-6 col-md-offset-3">
                {{ link_to_route('admin.clientes.index',"Cancelar", [], ['class' => 'btn btn-info']) }}
               {!! Form::submit('Modificar clientes', ['class' => 'btn btn-success']) !!}
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
           var form = $('#form_modificar_clientes');
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
                   Accept: 'application/json',
                   success: function (response, NULL, jqXHR) {
                       sessionStorage.setItem('update', 'El cliente se ha modificado exitosamente.');
                        window.location.href = " {{ route('admin.clientes.index')}} ";
                   },
                   error: function (data) {
                       console.log(data);
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