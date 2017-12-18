<link rel="stylesheet" type="text/css" href="css/micss.css">
	<h1>Listado de Series</h1>
	<table class="tdListado">
	<tr class="fondo">
		<th>Titulo</th>
		<th>Año</th>
		<th>Temporadas</th>
		<th>Completa</th>
		<th>Disco</th>
	</tr>
	@foreach ($series as $serie)
		<tr>
			<td>{{ $serie->title }}</td>
			<td>{{ $serie->year }}</td>
			<td>{{ $serie->temporada }}</td> 
			<td>
				@if ($serie->completed)
					Si
				@else
					No
				@endif
			</td> 
			<td>
				@if ($serie->disco_id == 1)
					TVDivx DVICO
				@elseif ($serie->disco_id == 2)
					Western Digital
				@elseif ($serie->disco_id == 3)
					Toshiba
				@elseif ($serie->disco_id == 4)
					Intenso
				@else 
					No hay disco
				@endif 
			</td>
			
			
		</tr>
	@endforeach
	</table>




	

	

