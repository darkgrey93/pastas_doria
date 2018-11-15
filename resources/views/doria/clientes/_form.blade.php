<div class="item form-group">
    {!! Form::label('nombre','Nombre', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('nombre', old('nombre'),[ 'class' => 'form-control col-md-6 col-sm-6 col-xs-12', 'required' => 'required', 'data-parsley-pattern'
        => '^[a-zA-Z\s]*$', 'data-parsley-pattern-message' => 'Por favor escriba solo letras', 'data-parsley-length' => "[1,
        50]", 'data-parsley-trigger'=>"change"] ) !!}
    </div>
</div>
<div class="item form-group">
    {!! Form::label('telefono','Telefono', [ 'class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('telefono', old('telefono'),[ 'class' => 'form-control col-md-6 col-sm-6 col-xs-12', 'required' =>
        'required' ] ) !!}
    </div>
</div>
<div class="item form-group">
    {!! Form::label('direccion','Direccion', [ 'class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('direccion', old('direccion'),[ 'class' => 'form-control col-md-6 col-sm-6 col-xs-12', 'required' =>
        'required' ] ) !!}
    </div>
</div>
<div class="item form-group">
    {!! Form::label('email','Email', [ 'class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::email('email', old('email'),[ 'class' => 'form-control col-md-6 col-sm-6 col-xs-12', 'required' =>
        'required' ] ) !!}
    </div>
</div>