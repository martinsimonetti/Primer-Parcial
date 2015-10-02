<?php 
session_start();
$dni=$_POST['dni'];
$recordar=$_POST['recordarme'];

$retorno;

	if($recordar=="true")
	{
		setcookie("registro",$usuario,  time()+36000 , '/');
		
	}else
	{
		setcookie("registro",$usuario,  time()-36000 , '/');
		
	}
	$_SESSION['registrado']=$dni;
	$retorno=" ingreso";


echo $retorno;
?>