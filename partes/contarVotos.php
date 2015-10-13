<?php
	setcookie("ultimaProvincia", $this->provincia, time()+86400, "/");
	if (isset($_COOKIE['contadorVotos'])) {
		$contador = $_COOKIE['contadorVotos'];	
	}
	else
	{
		$contador = 0;
	}
	$contador += 1;
	setcookie('contadorVotos', $contador, time()+48600, "/");
?>