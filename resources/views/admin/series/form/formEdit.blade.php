<div class="row">
	<div class="col-sm-6">
	    <div class="form-group label-floating">
	        {!!Form::label('title','Titulo de la serie')!!}
			{!!Form::text('title',null,['class'=>'form-control'])!!}
	    </div>
	</div> 

	<div class="col-sm-3">
	    <div class="form-group label-floating">
	        {!!Form::label('year','Año Inicio')!!}
			{!!Form::text('year',null,['class'=>'form-control'])!!}
	    </div>
	</div> 

	<div class="col-sm-3">
		<div class="form-group label-floating">	
			{!!Form::label('temporada','Temporadas')!!}
			{!!Form::text('temporada',null,['class'=>'form-control'])!!}
	    </div>
	</div> 
</div>
<div class="row">
	<div class="col-sm-5">
	    <div class="form-group label-floating">
	        {!!Form::label('country','País')!!}
			{!!Form::text('country',null,['class'=>'form-control'])!!}
	    </div>
	</div>

	<div class="col-sm-5">
	    <div class="form-group label-floating">
	        {!!Form::label('director','Director')!!}
			{!!Form::text('director',null,['class'=>'form-control'])!!}
	    </div>
	</div>

	<div class="col-sm-2">
	    <div class="form-group label-floating">
	        {!!Form::label('completed','Completa')!!}
			{{ Form::checkbox('completed') }}
	    </div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="form-group label-floating">
	        {!!Form::label('actor','Reparto')!!}
			<textarea class="form-control" name="actor" rows="3">{{ $serie->actor }}</textarea>
	    </div>
	   </div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="form-group label-floating">
	        {!!Form::label('sinopsis','Sinopsis')!!}
			<textarea class="form-control" name="sinopsis" rows="3">{{ $serie->sinopsis }}</textarea>
	    </div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="label-floating">
	        {!!Form::label('image','Cartel de la serie')!!}
			{!!Form::file('image')!!}
	    </div>
	</div>
	<div class="col-sm-6">
		<div class="form-group label-floating">
	        {!!Form::label('disco_id','Disco')!!}
			{!!Form::select('disco_id',$disco,$selectedDisk,['class'=>'form-control','placeholder'=>'Seleccione el disco de almacenamiento de la serie'])!!}
	    </div>
	</div>
</div>
