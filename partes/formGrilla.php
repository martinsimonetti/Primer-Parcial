<?php 
	require_once("clases/AccesoDatos.php");
	require_once("clases/voto.php");
	$arrayDevotos=voto::TraerTodoLosvotos();
	echo "<h2> Bienvenido: ". $_SESSION['registrado']."</h2>";

 ?>
<table class="table"  style=" background-color: beige;">
	<thead>
		<tr>
			<th>Editar</th><th>Borrar</th><th>DNI</th><th>Candidato</th><th>Provincia</th><th>Sexo</th>
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($arrayDevotos as $voto) {
	echo"<tr>
			<td><a onclick='Editarvoto($voto->id)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
			<td><a onclick='Borrarvoto($voto->id)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>  Borrar</a></td>
			<td>$voto->dni</td>
			<td>$voto->candidato</td>
			<td>$voto->provincia</td>
			<td>$voto->sexo</td>
		</tr>   ";
}
		 ?>
	</tbody>
</table>