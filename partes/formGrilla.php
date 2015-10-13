<?php 
	require_once("clases/AccesoDatos.php");
	require_once("clases/voto.php");
	$arrayDevotos=voto::TraerTodoLosvotos();

 ?>
<table class="table"  style=" background-color: beige;">
	<thead>
		<tr>
			<th>Editar</th><th>Borrar</th><th>DNI</th><th>Candidato</th><th>Provincia</th><th>Localidad</th><th>Dirección</th><th>Sexo</th><th>Mapa</th>
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($arrayDevotos as $voto) {
	$m = '"'.$voto->provincia.'", "'.$voto->direccion.'", "'.$voto->localidad.'", '.$voto->id;
	echo"<tr>
			<td><a onclick='Editarvoto($voto->id)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
			<td><a onclick='Borrarvoto($voto->id)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>  Borrar</a></td>
			<td>$voto->dni</td>
			<td>$voto->candidato</td>
			<td>$voto->provincia</td>
			<td>$voto->localidad</td>
			<td>$voto->direccion</td>
			<td>$voto->sexo</td>
			<td><a onclick='VerEnMapa($m)' class='btn btn-info'><span>&nbsp;</span>Ver en Mapa</a></td>
		</tr>   ";
}
		 ?>
	</tbody>
</table>