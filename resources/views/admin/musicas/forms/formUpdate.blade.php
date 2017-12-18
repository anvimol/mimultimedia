<div class="row">
    <div class="col-sm-6">
        <div class="form-group label-floating">
            {!!Form::label('artist','Artista',['class'=>'control-label'])!!}
            {!!Form::text('artist',null,['class'=>'form-control'])!!}
        </div>
    </div> 
    <div class="col-sm-3">
        <div class="form-group label-floating">
            {!!Form::label('year','Año',['class'=>'control-label'])!!}
            {!!Form::text('year',null,['class'=>'form-control'])!!}
        </div>
    </div> 
    <div class="col-sm-3">
        <div class="form-group label-floating">
            {!!Form::label('country','País',['class'=>'control-label'])!!}
            {!!Form::text('country',null,['class'=>'form-control'])!!}
        </div>
    </div>   
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group label-floating">
            {!!Form::label('title','Disco',['class'=>'control-label'])!!}
            {!!Form::text('title',null,['class'=>'form-control'])!!}
        </div>
    </div>   
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group label-floating">
            {!!Form::label('song','Canciones',['class'=>'control-label'])!!}
            <textarea class="form-control" name="song" rows="3">{{ $musica->song }}</textarea>
        </div>
       </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="label-floating">
            {!!Form::label('image','Caratula del disco')!!}
            {!!Form::file('image')!!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group label-floating">
            {!!Form::label('disco_id','Disco de almacenamiento')!!}
            {!!Form::select('disco_id',$disco,$selectedDisk,['class'=>'form-control','placeholder'=>'Seleccione el disco de almacenamiento'])!!}
        </div>
    </div>
</div>

<button type="submit" class="btn btn-info">Actualizar musica</button>
<a href="{{ route('musica.index') }}" class="btn btn-warning">Cancelar</a> 
