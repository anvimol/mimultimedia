<div class="row">
    <div class="col-sm-6">
        <div class="form-group label-floating">
            {!!Form::label('title','Nombre Pelicula',['class'=>'control-label'])!!}
            {!!Form::text('title',null,['class'=>'form-control'])!!}
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
            {!!Form::label('director','Director',['class'=>'control-label'])!!}
            {!!Form::text('director',null,['class'=>'form-control'])!!}
        </div>
    </div>   
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group label-floating">
            {!!Form::label('actor','Reparto',['class'=>'control-label'])!!}
            <textarea class="form-control" name="actor" rows="3"></textarea>
        </div>
       </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group label-floating">
            {!!Form::label('sinopsis','Sinopsis',['class'=>'control-label'])!!}
            <textarea class="form-control" name="sinopsis" rows="3"></textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="label-floating">
            {!!Form::label('image','Cartel de la pelicula')!!}
            {!!Form::file('image')!!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group label-floating">
            {!!Form::label('disco_id','Disco de almacenamiento')!!}
            {!!Form::select('disco_id',$disco,null,['class'=>'form-control','placeholder'=>'Seleccione el disco de almacenamiento'])!!}
        </div>
    </div>
</div>
