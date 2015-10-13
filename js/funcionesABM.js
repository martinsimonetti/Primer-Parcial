function Borrarvoto(idParametro)
{
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
		
	});
	funcionAjax.fail(function(retorno){
		alert(retorno);
	});	
}

function Editarvoto(idParametro)
{
	Mostrar('MostrarFormAlta');
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
		$("#id").val(voto.id);
		//alert(voto.id);
		$("#provincia").val(voto.provincia);
		//alert(voto.provincia);
		$("#localidad").val(voto.localidad);
		$("#direccion").val(voto.direccion);
		$("#candidato").val(voto.candidato);
		//alert(voto.candidato);
		//alert(voto.sexo);
		if (voto.sexo == 'M') {
			document.getElementById('sexoM').checked = true;
		}
		else{
			document.getElementById('sexoF').checked = true;
		}		
	});
	funcionAjax.fail(function(retorno){
		alert(retorno);
	});	
}

function GuardarVoto()
{
	var id=$("#id").val();
	var candidato=$("#candidato").val();
	var provincia=$("#provincia").val();
	var localidad=$("#localidad").val();
	var direccion=$("#direccion").val();
	var sexo;
	if (document.getElementById('sexoM').checked == true) {
		sexo = 'M';
	}
	else{
		sexo = 'F';
	}
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"POST",
		data:{
			queHacer:"GuardarVoto",
			candidato:candidato,
			provincia:provincia,
			localidad:localidad,
			direccion:direccion,
			sexo:sexo,
			id:id
		}
	});
	funcionAjax.done(function(retorno){
		$("#Contador").html(retorno);
		Mostrar("desloguear");
		Mostrar("MostrarGrilla");		
	});
	funcionAjax.fail(function(retorno){	
		alert(retorno);
	});	
}