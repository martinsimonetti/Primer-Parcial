<?php 
session_start();
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
	case 'MostarBotones':
			include("partes/botonesABM.php");
		break;
	case 'MostrarGrilla':
			include("partes/formGrilla.php");
		break;
	case 'MostarLogin':
			include("partes/formLogin.php");
		break;
	case 'MostrarFormAlta':
			include("partes/formCd.php");
		break;
	case 'BorrarCD':
			$cd = new cd();
			$cd->id=$_POST['id'];
			$cantidad=$cd->BorrarCd();
			echo $cantidad;

		break;
	case 'GuardarVoto':
			$voto = new voto();
			$voto->id=$_POST['id'];
			$voto->dni=$_SESSION['registrado'];
			$voto->candidato=$_POST['candidato'];
			$voto->provincia=$_POST['provincia'];
			$voto->sexo=$_POST['sexo'];
			$cantidad=$voto->Guardarvoto();
			echo $cantidad;

		break;
	case 'TraerCD':
			$cd = cd::TraerUnCd($_POST['id']);		
			echo json_encode($cd) ;

		break;
	default:
		# code...
		break;
}

 ?>