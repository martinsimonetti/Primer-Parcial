function validarLogin()
{
	//alert("Login");
	var varDni=$("#dni").val();
	//alert(varDni);
	var recordar=$("#recordarme").is(':checked');
	//alert(recordar);

	var funcionAjax=$.ajax({
		url:"php/validarDni.php",
		type:"post",
		data:{
			recordarme:recordar,
			dni:varDni,
		}
	});

	funcionAjax.done(function(retorno){
		//alert("done");
		Mostrar('MostrarFormAlta');
	});
	funcionAjax.fail(function(retorno){
		alert(retorno);	
	});
	
}
function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"php/deslogearDni.php",
		type:"post"		
	});
	funcionAjax.done(function(retorno){
		MostarLogin();			
	});	
}
