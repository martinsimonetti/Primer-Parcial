<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/voto.php");
$queHago=$_POST['queHacer'];

switch ($queHago) {
	case 'votacion':
		include("partes/formVotacion.php");
		break;
	case 'desloguear':
			include("php/deslogearDni.php");
		break;
	case 'MostrarGrilla':
			include("partes/formGrilla.php");
		break;
	case 'MostarLogin':
			include("partes/formLogin.php");
		break;
	case 'MostrarFormAlta':
			include("partes/formVotacion.php");
		break;
	case 'VerEnMapa':
		include("partes/formMapa.php");
		break;
	case 'BorrarVoto':
			$voto = new voto();
			$voto->id=$_POST['id'];
			$cantidad=$voto->Borrarvoto();
			echo $cantidad;
		break;
	case 'GuardarVoto':
			session_start();
			$voto = new voto();
			$voto->id=$_POST['id'];
			$voto->dni=$_SESSION['registrado'];
			$voto->candidato=$_POST['candidato'];
			$voto->provincia=$_POST['provincia'];
			$voto->localidad=$_POST['localidad'];
			$voto->direccion=$_POST['direccion'];
			$voto->sexo=$_POST['sexo'];
			$cantidad=$voto->Guardarvoto();
			echo $cantidad;
		break;
	case 'TraerVoto':
			$voto = voto::TraerUnvoto($_POST['id']);		
			echo json_encode($voto);
		break;
	default:
		# code...
		break;
}
 ?>