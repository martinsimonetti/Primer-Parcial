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

function Editarvoto(idParametro)
{
	//alert("Modificar");
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerVoto",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		var voto =JSON.parse(retorno);		
		//$("#id").val(voto.id);
		$("#provincia").val(voto.provincia);
		//$("#candidato").val(voto.candidato);
		//$("#sexo").val(voto.sexo);		
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(retorno.responseText);	
	});
	Mostrar('MostrarFormAlta');
}

function GuardarVoto()
{
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
		//alert(retorno);
		$("#informe").html(retorno.responseText);	
	});	
}