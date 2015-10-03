function Borrarvoto(idParametro)
{
	//alert(idParametro);
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"BorrarVoto",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		Mostrar("MostrarGrilla");
		$("#informe").html("cantidad de eliminados "+ retorno);	
		
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}

function EditarCD(idParametro)
{
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerCD",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		var cd =JSON.parse(retorno);	
		$("#idCD").val(cd.id);
		$("#cantante").val(cd.cantante);
		$("#titulo").val(cd.titulo);
		$("#anio").val(cd.año);
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
	Mostrar("MostrarFormAlta");
}

function GuardarVoto()
{
		alert("Entre al metodo");
		var id=$("#id").val();
		var candidato=$("#candidato").val();
		var provincia=$("#provincia").val();
		var sexo=$("#sexo").val();
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"POST",
		data:{
			queHacer:"GuardarVoto",
			candidato:candidato,
			provincia:provincia,
			sexo:sexo,
			id:id	
		}
	});
	funcionAjax.done(function(retorno){
		alert(retorno);
			Mostrar("desloguear");
			Mostrar("MostarLogin");
		$("#informe").html("cantidad de agregados "+ retorno);	
		
	});
	funcionAjax.fail(function(retorno){	
		alert(retorno);
		$("#informe").html(retorno.responseText);	
	});	
}