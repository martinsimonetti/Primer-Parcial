<?php 
	session_start();

	$dni=$_POST['dni'];
	$recordar=$_POST['recordarme'];
	$_SESSION['registrado'] = $dni;

	if($recordar=="true")
	{
		setcookie("registro",$dni,  time()+36000 , '/');
		
	}
	else
	{
		setcookie("registro",$dni,  time()-36000 , '/');
		
	}	
?>